function profilaxia2()
        {
            $.ajax({
                url: 'php/ajax/profilaxia2.php',
                type: 'POST',
                 data: {
                        metodo: "getProfilaxia2",
                        $idCirurgia: $idCirurgia
                      },
                cache: false,
                datatype: "json",
                error: function(jqXHR) {
                    toastr.error(jqXHR.responseText, "Error");
                },
                success: function(data) {
                    
                    if(data.msg.length > 0)
                    {
                        idProfilaxia2 = data.msg[0].idPROFILAXIA2;
                        var re = /\s*,\s*/;
                        var nameList1 = data.msg[0].DESCRICAO.split(re);
                        
                        
                        for(var x = 0; x <= nameList1.length; x++)
                        {
                            for(var i = 0; i <= $("input[name=fatoRiscoParaTEV]").length; i++)
                            {
                                if(nameList1[x] === $("input[name=fatoRiscoParaTEV]").eq(i).val())
                                {
                                    $("input[name=fatoRiscoParaTEV]").eq(i).prop("checked", true);
                                }
                            }
                        }
                    }
                },
            });
        }
        $(document).on("click", ".btnCriarProfilaxia2", function(){
            
            fatoRiscoParaTEV = "";
            
            for(var i = 0; i <= $("input[name=fatoRiscoParaTEV]").length; i++)
            {
                if($("input[name=fatoRiscoParaTEV]").eq(i).is(":checked") === true)
                {
                    fatoRiscoParaTEV += $("input[name=fatoRiscoParaTEV]").eq(i).val()+",";
                }
            }
            
            var metodo;
            
            if(fatoRiscoParaTEV.length > 0)
            {
                if(idProfilaxia2 > 0)
                {
                    metodo = "update";
                }
                else
                {
                    metodo = "add";
                }
                $.ajax({
                    url: 'php/ajax/profilaxia2.php',
                    type: 'POST',
                     data: {
                            metodo: metodo,
                            idProfilaxia2:idProfilaxia2,
                            idCirurgia:$idCirurgia,
                            fatoRiscoParaTEV:fatoRiscoParaTEV
                          },
                    cache: false,
                    datatype: "json",
                    error: function(jqXHR) {
                        toastr.error(jqXHR.responseText, "Error");
                    },
                    success: function(data) {
                        toastr.success(data.msg, "Sucesso");
                        setTimeout(function(){
                            window.location.reload(1);
                         }, 2000);
                    },
                });
            }
            else
            {
                $("input").css({"border":"red solid 1px"});
                toastr.warning("Informe todos os campos", "Alerta");
                
            }
        });