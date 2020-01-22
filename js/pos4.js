function pos4()
        {
            $.ajax({
                url: 'php/ajax/pos4.php',
                type: 'POST',
                 data: {
                        metodo: "getPos4",
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
                        idPos4 = data.msg[0].idPOS4;
                        
                        $("select[name=alta]").val(data.msg[0].alta);
                        $("textarea[name=obserAlta]").val(data.msg[0].obserAlta);
                        $("select[name=bomEG]").val(data.msg[0].bomEG);
                        $("select[name=dispositivo]").val(data.msg[0].dispositivo);
                        $("input[name=dispositivoOp]").eq((data.msg[0].dispositivoOp-1)).prop("checked", true);
                        $("textarea[name=obserDispositivos]").val(data.msg[0].obserDispositivos);
                        $("select[name=avaliacaoFC]").val(data.msg[0].avaliacaoFC);
                        $("input[name=avaliacaoFCOp]").eq((data.msg[0].avaliacaoFCOp-1)).prop("checked", true);
                        $("select[name=OCADRA]").val(data.msg[0].OCADRA);
                        $("textarea[name=obserOCADRA]").val(data.msg[0].obserOCADRA);
                        
                        if(data.msg[0].alta === "Outro local" || data.msg[0].alta === "Transferência (para outro setor)")
                        {
                            $("textarea[name=obserAlta]").prop("disabled",false);
                        }
                        else
                        {
                            $("textarea[name=obserAlta]").prop("disabled",true);
                        }
                        
                        if(data.msg[0].dispositivoOp === "4" || data.msg[0].dispositivoOp === "5" || data.msg[0].dispositivoOp === "6")
                        {
                            $("textarea[name=obserDispositivos]").prop("disabled",false);
                        }
                        else
                        {
                            $("textarea[name=obserDispositivos]").prop("disabled",true);
                        }
                        
                        
                    }
                },
            });
        }
        
        $(document).on('change','select[name=alta]',function(){
            if($(this).val() === "Outro local" || $(this).val() === "Transferência (para outro setor)")
            {
                $("textarea[name=obserAlta]").prop("disabled",false);
            }
            else
            {
                $("textarea[name=obserAlta]").prop("disabled",true);
            }
        });
        
        $(document).on('click','input[name=dispositivoOp]',function(){
            if($(this).val() === "4" || $(this).val() === "5" || $(this).val() === "6")
            {
                $("textarea[name=obserDispositivos]").prop("disabled",false);
            }
            else
            {
                $("textarea[name=obserDispositivos]").prop("disabled",true);
            }
        });
        
        $(document).on("click", ".btnCriarPos4", function(){
            
            alta = $("select[name=alta]").val();
            obserAlta = $("textarea[name=obserAlta]").val();
            bomEG = $("select[name=bomEG]").val();
            dispositivo = $("select[name=dispositivo]").val();
            dispositivoOp = "";
            for(var x = 0; x <= $("input[name=dispositivoOp]").length; x++)
            {
                if($("input[name=dispositivoOp]").eq(x).is(":checked") === true)
                {
                    dispositivoOp =  $("input[name=dispositivoOp]").eq(x).val();
                }
            }
            obserDispositivos = $("textarea[name=obserDispositivos]").val();
            avaliacaoFC = $("select[name=avaliacaoFC]").val();
            avaliacaoFCOp = "";
            for(var x = 0; x <= $("input[name=avaliacaoFCOp]").length; x++)
            {
                if($("input[name=avaliacaoFCOp]").eq(x).is(":checked") === true)
                {
                    avaliacaoFCOp =  $("input[name=avaliacaoFCOp]").eq(x).val();
                }
            }
            OCADRA = $("select[name=OCADRA]").val();
            obserOCADRA = $("textarea[name=obserOCADRA]").val();
                    
            if(true)
            {
                if(idPos4 > 0)
                {
                    metodo = "update";
                }
                else
                {
                    metodo = "add";
                }
                $.ajax({
                    url: 'php/ajax/pos4.php',
                    type: 'POST',
                     data: {
                            metodo: metodo,
                            idPos4:idPos4,
                            $idCirurgia:$idCirurgia,
                            alta:alta,
                            obserAlta:obserAlta,
                            bomEG:bomEG,
                            dispositivo:dispositivo,
                            dispositivoOp:dispositivoOp,
                            obserDispositivos:obserDispositivos,
                            avaliacaoFC:avaliacaoFC,
                            avaliacaoFCOp:avaliacaoFCOp,
                            OCADRA:OCADRA,
                            obserOCADRA:obserOCADRA
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