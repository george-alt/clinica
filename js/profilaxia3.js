$(document).on("change","select[name=ARNPRisco]",function(){
            
            //$("input[name=ARNTipoS]").prop("checked",false);
            //$("input[name=ARNTipoC]").prop("checked",false);
            
            if($(this).val() === "1" || $(this).val() === "2")
            {
                $(".ARNTipoSOb").removeClass("ARNTipoS");
                $(".ARNTipoCOb").addClass("ARNTipoC");
                $(".ARNBaixoOb").addClass("ARNBaixo");
            }
            else if($(this).val() === "3" || $(this).val() === "4")
            {
                $(".ARNTipoSOb").addClass("ARNTipoS");
                $(".ARNTipoCOb").removeClass("ARNTipoC");
                $(".ARNBaixoOb").addClass("ARNBaixo");
            }
            else
            {
                $(".ARNTipoSOb").addClass("ARNTipoS");
                $(".ARNTipoCOb").addClass("ARNTipoC");
                $(".ARNBaixoOb").removeClass("ARNBaixo");
            }
        });
        
        function profilaxia3()
        {
            $.ajax({
                url: 'php/ajax/profilaxia3.php',
                type: 'POST',
                 data: {
                        metodo: "getProfilaxia3",
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
                        idProfilaxia3 = data.msg[0].idPROFILAXIA3;
                        var re = /\s*,\s*/;
                        var nameList1 = data.msg[0].ARNTipoS.split(re);
                        var nameList2 = data.msg[0].ARNTipoC.split(re);
                        
                        
                        for(var x = 0; x <= nameList1.length; x++)
                        {
                            for(var i = 0; i <= $("input[name=ARNTipoS]").length; i++)
                            {
                                if(nameList1[x] === $("input[name=ARNTipoS]").eq(i).val())
                                {
                                    $("input[name=ARNTipoS]").eq(i).prop("checked", true);
                                }
                            }
                        }
                        
                        for(var y = 0; y <= nameList2.length; y++)
                        {
                            for(var a = 0; a <= $("input[name=ARNTipoC]").length; a++)
                            {
                                if(nameList2[y] === $("input[name=ARNTipoC]").eq(a).val())
                                {
                                    $("input[name=ARNTipoC]").eq(a).prop("checked", true);
                                }
                            }
                        }
                        
                        $("select[name=ARNPRisco]").val(data.msg[0].risco);
                        
                        if(data.msg[0].risco === "1" || data.msg[0].risco === "2")
                        {
                            $(".ARNTipoSOb").removeClass("ARNTipoS");
                            $(".ARNTipoCOb").addClass("ARNTipoC");
                            $(".ARNBaixoOb").addClass("ARNBaixo");
                        }
                        else if(data.msg[0].risco === "3" || data.msg[0].risco === "4")
                        {
                            $(".ARNTipoSOb").addClass("ARNTipoS");
                            $(".ARNTipoCOb").removeClass("ARNTipoC");
                            $(".ARNBaixoOb").addClass("ARNBaixo");
                        }
                        else
                        {
                            $(".ARNTipoSOb").addClass("ARNTipoS");
                            $(".ARNTipoCOb").addClass("ARNTipoC");
                            $(".ARNBaixoOb").removeClass("ARNBaixo");
                        }
                    }
                },
            });
        }
        $(document).on("click", ".btnCriarProfilaxia3", function(){
            
            ARNTipoS = "";
            
            for(var i = 0; i <= $("input[name=ARNTipoS]").length; i++)
            {
                if($("input[name=ARNTipoS]").eq(i).is(":checked") === true)
                {
                    ARNTipoS += $("input[name=ARNTipoS]").eq(i).val()+",";
                }
            }
            
            ARNTipoC = "";
            
            for(var x = 0; x <= $("input[name=ARNTipoC]").length; x++)
            {
                if($("input[name=ARNTipoC]").eq(x).is(":checked") === true)
                {
                    ARNTipoC += $("input[name=ARNTipoC]").eq(x).val()+",";
                }
            }
            
            risco = $("select[name=ARNPRisco]").val();
            
            var metodo;
            
            if(ARNTipoS.length > 0 || ARNTipoC.length > 0)
            {
                if(idProfilaxia3 > 0)
                {
                    metodo = "update";
                }
                else
                {
                    metodo = "add";
                }
                $.ajax({
                    url: 'php/ajax/profilaxia3.php',
                    type: 'POST',
                     data: {
                            metodo: metodo,
                            idProfilaxia3:idProfilaxia3,
                            idCirurgia:$idCirurgia,
                            ARNTipoS:ARNTipoS,
                            ARNTipoC: ARNTipoC,
                            risco: risco
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