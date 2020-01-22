function pos2()
        {
            $.ajax({
                url: 'php/ajax/pos2.php',
                type: 'POST',
                 data: {
                        metodo: "getPos2",
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
                        idPos2 = data.msg[0].idPOS2;
                        $("input[name=dataPos2]").val(data.msg[0].DATA);
                        $("select[name=dor]").val(data.msg[0].DOR);
                        $("select[name=sistemaRespiratorio]").val(data.msg[0].sistemaRespiratorio);
                        $("select[name=sistemaDU]").val(data.msg[0].sistemaDU);
                        $("select[name=sistemaCardiovascular]").val(data.msg[0].sistemaCardiovascular);
                        $("select[name=sistemaTegumentar]").val(data.msg[0].sistemaTegumentar);
                       
                        if(data.msg[0].sistemaTegumentar === "Lesões")
                        {
                            $("textarea[name=oberSistemaTegumentar]").prop("disabled", false);
                        }
                        else
                        {
                            $("textarea[name=oberSistemaTegumentar]").prop("disabled", true);
                        }
                        $("textarea[name=oberSistemaTegumentar]").val(data.msg[0].oberSistemaTegumentar);
                        $("select[name=sitioCirurgico]").val(data.msg[0].sitioCirurgico);
                        
                    }
                },
            });
        }
        
        $(document).on("change","select[name=sistemaTegumentar]", function(){
            
            if($(this).val() === "Lesões")
            {
                $("textarea[name=oberSistemaTegumentar]").prop("disabled", false);
            }
            else
            {
                $("textarea[name=oberSistemaTegumentar]").prop("disabled", true);
            }
        });
        
        $(document).on("click", ".btnCriarPos2", function(){
            
            dataPos2                = $("input[name=dataPos2]").val();
            dor                     = $("select[name=dor]").val();
            sistemaRespiratorio     = $("select[name=sistemaRespiratorio]").val();
            sistemaDU               = $("select[name=sistemaDU]").val();
            sistemaCardiovascular   = $("select[name=sistemaCardiovascular]").val();
            sistemaTegumentar       = $("select[name=sistemaTegumentar]").val();
            oberSistemaTegumentar   = $("textarea[name=oberSistemaTegumentar]").val();
            sitioCirurgico          = $("select[name=sitioCirurgico]").val();
            
            if(true)
            {
                if(idPos2 > 0)
                {
                    metodo = "update";
                }
                else
                {
                    metodo = "add";
                }
                $.ajax({
                    url: 'php/ajax/pos2.php',
                    type: 'POST',
                     data: {
                            metodo: metodo,
                            idPos2:idPos2,
                            $idCirurgia:$idCirurgia,
                            dataPos2:dataPos2,
                            dor:dor,
                            sistemaRespiratorio:sistemaRespiratorio,
                            sistemaDU:sistemaDU,
                            sistemaCardiovascular:sistemaCardiovascular,
                            sistemaTegumentar:sistemaTegumentar,
                            oberSistemaTegumentar:oberSistemaTegumentar,
                            sitioCirurgico:sitioCirurgico
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