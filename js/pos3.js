function pos3()
        {
            $.ajax({
                url: 'php/ajax/pos3.php',
                type: 'POST',
                 data: {
                        metodo: "getPos3",
                        $idCirurgia: $idCirurgia
                      },
                cache: false,
                datatype: "json",
                error: function(jqXHR) {
                    toastr.error(jqXHR.responseText, "Error");
                },
                success: function(data) {
                    
                    if(data.msg.length > 0 && data.msg != null)
                    {
                        idPos3 = data.msg[0].idPOS3;
                        
                        var re = /\s*,\s*/;
                        var reData = /\s*-\s*/;
                        var nameList1 = data.msg[0].complicaoPos3op.split(re);
                        var nameList2 = data.msg[0].dataComplicaoPos3op.split(re);
                        var arrNameList2 = [];
                        for(var x = 0; x <= nameList1.length; x++)
                        {
                            for(var i = 0; i <= $("input[name=complicaoPos3op]").length; i++)
                            {
                                if(nameList1[x] === $("input[name=complicaoPos3op]").eq(i).val())
                                {
                                    $("input[name=complicaoPos3op]").eq(i).prop("checked", true);
                                }
                            }
                        }
                        
                        for(var y = 0; y <= nameList2.length; y++)
                        {
                            arrNameList2 = nameList2[y].split(reData);
                            $("input[name=dataPos3]").eq(arrNameList2[0]).val(arrNameList2[1]);
                            if(y == 14){break;}
                        }
                        
                        $("textarea[name=obserReacaoAM]").val(data.msg[0].obserReacaoAM);
                        $("textarea[name=obserOutra]").val(data.msg[0].obserOutra);
                        
                         if($("input[name=complicaoPos3op]").eq(4).is(":checked") === true)
                        {
                            $("textarea[name=obserReacaoAM]").prop("disabled",false);
                        }
                        if($("input[name=complicaoPos3op]").eq(13).is(":checked") === true)
                        {
                            $("textarea[name=obserOutra]").prop("disabled",false);
                        }
                        else
                        {
                            $("textarea[name=obserReacaoAM]").prop("disabled",true);
                            $("textarea[name=obserOutra]").prop("disabled",true);
                        }
                        
                    }
                },
            });
        }
        
        $(document).on("click","input[name=complicaoPos3op]",function(){
            
            for(var x = 0; x <= $("input[name=complicaoPos3op]").length; x++)
            {
                if($("input[name=complicaoPos3op]").eq(4).is(":checked") === true)
                {
                    $("textarea[name=obserReacaoAM]").prop("disabled",false);
                }
                else if($("input[name=complicaoPos3op]").eq(13).is(":checked") === true)
                {
                    $("textarea[name=obserOutra]").prop("disabled",false);
                }
                else
                {
                    $("textarea[name=obserReacaoAM]").prop("disabled",true);
                    $("textarea[name=obserOutra]").prop("disabled",true);
                }
            }

            
        });
        
        $(document).on("click", ".btnCriarPos3", function(){
            
            complicaoPos3op = "";
            dataComplicaoPos3op = "";
            for(var x = 0; x <= $("input[name=complicaoPos3op]").length; x++)
            {
                if($("input[name=complicaoPos3op]").eq(x).is(":checked") === true)
                {
                    complicaoPos3op +=  $("input[name=complicaoPos3op]").eq(x).val()+", ";
                    dataComplicaoPos3op += x +" - "+$("input[name=dataPos3").eq(x).val()+", ";
                }
            }
            
            obserReacaoAM = $("textarea[name=obserReacaoAM]").val();
            obserOutra = $("textarea[name=obserOutra]").val();
                    
            if(true)
            {
                if(idPos3 > 0)
                {
                    metodo = "update";
                }
                else
                {
                    metodo = "add";
                }
                $.ajax({
                    url: 'php/ajax/pos3.php',
                    type: 'POST',
                     data: {
                            metodo: metodo,
                            idPos3:idPos3,
                            $idCirurgia:$idCirurgia,
                            complicaoPos3op:complicaoPos3op,
                            dataComplicaoPos3op:dataComplicaoPos3op,
                            obserReacaoAM:obserReacaoAM,
                            obserOutra:obserOutra
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
                $("textarea").css({"border":"red solid 1px"});
                toastr.warning("Informe todos os campos", "Alerta");
                
            }
        });