function laudo()
        {
            $.ajax({
                url: 'php/ajax/laudo.php',
                type: 'POST',
                 data: {
                        metodo: "getLaudo",
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
                        idLaudo = data.msg[0].idLAUDO;
                        
                        $("select[name=medico1]").val(data.msg[0].MEDICO1);
                        $("select[name=medico2]").val(data.msg[0].MEDICO2);
                        $("select[name=medico3]").val(data.msg[0].MEDICO3);
                        $("select[name=medico4]").val(data.msg[0].MEDICO4);
                        $("select[name=medico5]").val(data.msg[0].MEDICO5);
                        
                        $("select[name=laudoEnfermeiro]").val(data.msg[0].ENFERMEIRO);
                        $("select[name=laudoAnestesiologista]").val(data.msg[0].ANESTESIOLOGISTA);
                        $("select[name=laudoInstrumentador]").val(data.msg[0].INSTRUMENTADOR);
            
                        $("textarea[name=obserLaudoAnestesia]").val(data.msg[0].ANSTESIA);
                        $("textarea[name=obserLaudoProfilaxia]").val(data.msg[0].PROFILAXIA);
                        $("textarea[name=obserLaudoDiagnosticoPreOperatorio]").val(data.msg[0].DIAGNOSTICOPREOPERATORIO);
                        $("textarea[name=obserLaudoAchadosCirurgico1]").val(data.msg[0].ACHADOCIRURGICO1);
                        $("textarea[name=obserLaudoAchadosCirurgico2]").val(data.msg[0].ACHADOCIRURGICO2);
                        $("textarea[name=obserLaudoPCE]").val(data.msg[0].PROCEDIMENTOCIRURGICOEFETUADOS);
                        $("textarea[name=obserLaudoPPPSC]").val(data.msg[0].PPPSC);
            
                        $("input[name=laudoTempoTC]").val(data.msg[0].TEMPOCIRURGIA);
                        $("input[name=laudoPerdaSanguina]").val(data.msg[0].PERDASANGUINEA);
                        
                        
                    }
                },
            });
        }
        
        $(document).on("click", ".btnCriarLaudo", function(){
            $medico1 = $("select[name=medico1]").val();
            $medico2 = $("select[name=medico2]").val();
            $medico3 = $("select[name=medico3]").val();
            $medico4 = $("select[name=medico4]").val();
            $medico5 = $("select[name=medico5]").val();
            
            $enfermeiro             = $("select[name=laudoEnfermeiro]").val();
            $laudoAnestesiologista  = $("select[name=laudoAnestesiologista]").val();
            $laudoInstrumentador    = $("select[name=laudoInstrumentador]").val();
            
            $obserLaudoAnestesia                    = $("textarea[name=obserLaudoAnestesia]").val();
            $obserLaudoProfilaxia                   = $("textarea[name=obserLaudoProfilaxia]").val();
            $obserLaudoDiagnosticoPreOperatorio     = $("textarea[name=obserLaudoDiagnosticoPreOperatorio]").val();
            $obserLaudoAchadosCirurgico1            = $("textarea[name=obserLaudoAchadosCirurgico1]").val();
            $obserLaudoAchadosCirurgico2            = $("textarea[name=obserLaudoAchadosCirurgico2]").val();
            $obserLaudoPCE                          = $("textarea[name=obserLaudoPCE]").val();
            $obserLaudoPPPSC                        = $("textarea[name=obserLaudoPPPSC]").val();
            
            $laudoTempoTC       = $("input[name=laudoTempoTC]").val();
            $laudoPerdaSanguina = $("input[name=laudoPerdaSanguina]").val();
            
            if(true)
            {
                if(idLaudo > 0)
                {
                    metodo = "update";
                }
                else
                {
                    metodo = "add";
                }
                $.ajax({
                    url: 'php/ajax/laudo.php',
                    type: 'POST',
                     data: {
                            metodo: metodo,
                            idLaudo:idLaudo,
                            $idCirurgia:$idCirurgia,
                            $medico1:$medico1,
                            $medico2:$medico2,
                            $medico3:$medico3,
                            $medico4:$medico4,
                            $medico5:$medico5,
                            $enfermeiro:$enfermeiro,
                            $laudoAnestesiologista:$laudoAnestesiologista,
                            $laudoInstrumentador:$laudoInstrumentador,
                            $obserLaudoAnestesia:$obserLaudoAnestesia,
                            $obserLaudoProfilaxia:$obserLaudoProfilaxia,
                            $obserLaudoDiagnosticoPreOperatorio:$obserLaudoDiagnosticoPreOperatorio,
                            $obserLaudoAchadosCirurgico1:$obserLaudoAchadosCirurgico1,
                            $obserLaudoAchadosCirurgico2:$obserLaudoAchadosCirurgico2,
                            $obserLaudoPCE:$obserLaudoPCE,
                            $obserLaudoPPPSC:$obserLaudoPPPSC,
                            $laudoTempoTC:$laudoTempoTC,
                            $laudoPerdaSanguina:$laudoPerdaSanguina
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