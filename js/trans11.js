function getTrans1()
        {
            $.ajax({
                url: 'php/ajax/trans1.php',
                type: 'POST',
                 data: {
                        metodo: "getTrans1",
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
                        idTrans1 = data.msg[0].idTRANS1;
                        var re = /\s*,\s*/;
                        var nameList1 = data.msg[0].CSC.split(re);
                        var nameList2 = data.msg[0].NVADF.split(re);
                        
                        for(var x = 0; x <= nameList1.length; x++)
                        {
                            for(var i = 0; i <= $("input[name=CSC]").length; i++)
                            {
                                if(nameList1[x] === $("input[name=CSC]").eq(i).val())
                                {
                                    $("input[name=CSC]").eq(i).prop("checked", true);
                                }
                            }
                        }
                        
                        for(var x = 0; x <= nameList2.length; x++)
                        {
                            for(var i = 0; i <= $("input[name=NVADF]").length; i++)
                            {
                                if(nameList2[x] === $("input[name=NVADF]").eq(i).val())
                                {
                                    $("input[name=NVADF]").eq(i).prop("checked", true);
                                }
                            }
                        }
                        
                        $("select[name=MSOAPP]").val(data.msg[0].MSOAP);
                        $("select[name=REA]").val(data.msg[0].REA);
                        $("select[name=RPS]").val(data.msg[0].RPS);
                        $("select[name=AVAP]").val(data.msg[0].AVAP);
                        $("select[name=clienteAlergia]").val(data.msg[0].CLIENTEALERGIA);
                        $("textarea[name=obser]").val(data.msg[0].OBSERVACAO);
                    }
                },
            });
        }
        
        $(document).on("click", ".btnCriarCheck11", function(){
            $CSC = "";
            $NVADF = "";
            
            for(var i = 0; i <= $("input[name=CSC]").length; i++)
            {
                if($("input[name=CSC]").eq(i).is(":checked") === true)
                {
                    $CSC += $("input[name=CSC]").eq(i).val()+",";
                }
            }
            $MSOAP = $("select[name=MSOAPP]").val();
            $REA = $("select[name=REA]").val();
            
            for(var x = 0; x <= $("input[name=NVADF]").length; x++)
            {
                if($("input[name=NVADF]").eq(x).is(":checked") === true)
                {
                    $NVADF += $("input[name=NVADF]").eq(x).val()+",";
                }
            }
            
            $RPS = $("select[name=RPS]").val();
            $AVAP = $("select[name=AVAP]").val();
            $clienteAlergia = $("select[name=clienteAlergia]").val();
            $obser = $("textarea[name=obser]").val();
            
            
            var metodo;
            
            if($idCirurgia !== "" && $CSC !== "" && $NVADF !== "" && $MSOAP !== "" && $REA !== "" && $RPS !== "" && $AVAP !== "" && $clienteAlergia !== "" && $obser !== "")
            {
                if(idTrans1 > 0)
                {
                    metodo = "update";
                }
                else
                {
                    metodo = "add";
                }
                $.ajax({
                    url: 'php/ajax/trans1.php',
                    type: 'POST',
                     data: {
                            metodo: metodo,
                            idTrans1:idTrans1,
                            idCirurgia:$idCirurgia,
                            CSC: $CSC,
                            NVADF: $NVADF,
                            MSOAP: $MSOAP,
                            REA: $REA,
                            RPS: $RPS,
                            AVAP: $AVAP,
                            clienteAlergia:$clienteAlergia,
                            obser: $obser
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
                        });
                    },
                });
            }
            else
            {
                $("input").css({"border":"red solid 1px"});
                toastr.warning("Informe todos os campos", "Alerta");
                
            }
            
        });