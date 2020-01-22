function getTrans13()
        {
            $.ajax({
                url: 'php/ajax/trans1.2.php',
                type: 'POST',
                 data: {
                        metodo: "getTrans3",
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
                        idTrans1_3 = data.msg[0].idTRANS1_1;
                        $("textarea[name=precedimentoRealizado]").val(data.msg[0].PROCEDIMENTOREALIZADO);
                        $("select[name=CCAIC]").val(data.msg[0].CCAIC);
                        $("select[name=PACIARP]").val(data.msg[0].PACIARP);
                        $("select[name=HAPER]").val(data.msg[0].HAPER);
                        $("textarea[name=RIRPAPOC]").val(data.msg[0].RIRPAPOC);
                    }
                },
            });
        }
        $(document).on("click", ".btnCriarTrans13", function(){
        
            $precedimentoRealizado = $("textarea[name=precedimentoRealizado]").val();
            $CCAIC = $("select[name=CCAIC]").val();
            $PACIARP = $("select[name=PACIARP]").val();
            $HAPER = $("select[name=HAPER]").val();
            $RIRPAPOC = $("textarea[name=RIRPAPOC]").val();
            
            
            var metodo;
            
            if($idCirurgia !== "" && $precedimentoRealizado !== "" && $CCAIC !== "" && $PACIARP !== "" && $HAPER !== "")
            {
                if(idTrans1_3 > 0)
                {
                    metodo = "update";
                }
                else
                {
                    metodo = "add";
                }
                $.ajax({
                    url: 'php/ajax/trans1.2.php',
                    type: 'POST',
                     data: {
                            metodo: metodo,
                            idTrans1_3:idTrans1_3,
                            idCirurgia:$idCirurgia,
                            precedimentoRealizado: $precedimentoRealizado,
                            CCAIC: $CCAIC,
                            PACIARP: $PACIARP,
                            HAPER: $HAPER,
                            RIRPAPOC: $RIRPAPOC
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