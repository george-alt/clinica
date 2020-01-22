function pos1()
        {
            $.ajax({
                url: 'php/ajax/pos1.php',
                type: 'POST',
                 data: {
                        metodo: "getPos1",
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
                        idPos1 = data.msg[0].idPOS1;
                        
                        $("input[name=nivelConscienciaOp]").eq((data.msg[0].nivelConscienciaOp-1)).prop("checked", true);
                        $("input[name=pacienteRDAOp]").eq((data.msg[0].pacienteRDAOp-1)).prop("checked", true);
                        $("input[name=acessoVPOp]").eq((data.msg[0].acessoVPOp-1)).prop("checked", true);
                        $("input[name=fichaETRPOp]").eq((data.msg[0].fichaETRPOp-1)).prop("checked", true);
                        $("input[name=mobilidadeMembrosOp]").eq((data.msg[0].mobilidadeMembrosOp-1)).prop("checked", true);
                        $("input[name=curativoCirurgicoOp]").eq((data.msg[0].curativoCirurgicoOp-1)).prop("checked", true);
                        $("input[name=sistemaDrenagemOp]").eq((data.msg[0].sistemaDrenagemOp-1)).prop("checked", true);
                        if(data.msg[0].sistemaDrenagemOp === "4")
                        {
                             $("textarea[name=oberSistemaDrenagem]").prop("disabled", false);
                        }
                        else
                        {
                             $("textarea[name=oberSistemaDrenagem]").prop("disabled", true);
                        }
                        $("input[name=CPPTEOp]").eq((data.msg[0].CPPTEOp-1)).prop("checked", true);
                        $("input[name=tipoAnestesiaOp]").eq((data.msg[0].tipoAnestesiaOp-1)).prop("checked", true);
                        
                        
                        $("select[name=nivelConsciencia]").val(data.msg[0].nivelConsciencia);
                        $("select[name=sinaisVE]").val(data.msg[0].sinaisVE);
                        $("textarea[name=oberSinaisVE]").val(data.msg[0].oberSinaisVE);
                        $("select[name=nauseaVomito]").val(data.msg[0].nauseaVomito);
                        $("textarea[name=oberNauseaVomito]").val(data.msg[0].oberNauseaVomito);
                        $("select[name=tipoAnestesia]").val(data.msg[0].tipoAnestesia);
                        $("select[name=CPPTE]").val(data.msg[0].CPPTE);
                        $("select[name=sistemaDrenagem]").val(data.msg[0].sistemaDrenagem);
                        $("textarea[name=oberSistemaDrenagem]").val(data.msg[0].oberSistemaDrenagem);
                        $("select[name=curativoCirurgico]").val(data.msg[0].curativoCirurgico);
                        $("select[name=mobilidadeMembros]").val(data.msg[0].mobilidadeMembros);
                        $("select[name=prescricaoMedica]").val(data.msg[0].prescricaoMedica);
                        $("select[name=avisadoMedico]").val(data.msg[0].avisadoMedico);
                        $("select[name=fichaETRP]").val(data.msg[0].fichaETRP);
                        $("textarea[name=oberFichaETRP]").val(data.msg[0].oberFichaETRP);
                        $("select[name=acessoVP]").val(data.msg[0].acessoVP);
                        $("textarea[name=oberAcessoVP]").val(data.msg[0].oberAcessoVP);
                        $("select[name=pacienteRDA]").val(data.msg[0].pacienteRDA);
                        $("select[name=recomendacaoEspecial]").val(data.msg[0].recomendacaoEspecial);
                        $("textarea[name=oberRecomendacaoEspecial]").val(data.msg[0].oberRecomendacaoEspecial);
                        
                    }
                },
            });
        }
        
        $(document).on("click","input[name=sistemaDrenagemOp]",function(){
            
           if($(this).val() === "4")
           {
                $("textarea[name=oberSistemaDrenagem]").prop("disabled", false);
           }
           else
           {
                $("textarea[name=oberSistemaDrenagem]").prop("disabled", true);
                $("textarea[name=oberSistemaDrenagem]").val(null);
           }
        });
        
        $(document).on("click", ".btnCriarPos1", function(){
            
            nivelConsciencia = $("select[name=nivelConsciencia]").val();
            nivelConscienciaOp = "";
            for(var x = 0; x <= $("input[name=nivelConscienciaOp]").length; x++)
            {
                if($("input[name=nivelConscienciaOp]").eq(x).is(":checked") === true)
                {
                    nivelConscienciaOp =  $("input[name=nivelConscienciaOp]").eq(x).val();
                }
            }
            sinaisVE = $("select[name=sinaisVE]").val();
            oberSinaisVE = $("textarea[name=oberSinaisVE]").val();
            nauseaVomito = $("select[name=nauseaVomito]").val();
            oberNauseaVomito = $("textarea[name=oberNauseaVomito]").val();
            tipoAnestesia = $("select[name=tipoAnestesia]").val();
            tipoAnestesiaOp = "";
            for(var a = 0; a <= $("input[name=tipoAnestesiaOp]").length; a++)
            {
                if($("input[name=tipoAnestesiaOp]").eq(a).is(":checked") === true)
                {
                    tipoAnestesiaOp =  $("input[name=tipoAnestesiaOp]").eq(a).val();
                }
            }
            CPPTE = $("select[name=CPPTE]").val();
            CPPTEOp = "";
            for(var b = 0; b <= $("input[name=CPPTEOp]").length; b++)
            {
                if($("input[name=CPPTEOp]").eq(b).is(":checked") === true)
                {
                    CPPTEOp =  $("input[name=CPPTEOp]").eq(b).val();
                }
            }
            sistemaDrenagem = $("select[name=sistemaDrenagem]").val();
            sistemaDrenagemOp = "";
            for(var c = 0; c <= $("input[name=sistemaDrenagemOp]").length; c++)
            {
                if($("input[name=sistemaDrenagemOp]").eq(c).is(":checked") === true)
                {
                    sistemaDrenagemOp =  $("input[name=sistemaDrenagemOp]").eq(c).val();
                }
            }
            oberSistemaDrenagem = $("textarea[name=oberSistemaDrenagem]").val();
            curativoCirurgico = $("select[name=curativoCirurgico]").val();
            curativoCirurgicoOp = "";
            for(var d = 0; d <= $("input[name=curativoCirurgicoOp]").length; d++)
            {
                if($("input[name=curativoCirurgicoOp]").eq(d).is(":checked") === true)
                {
                    curativoCirurgicoOp =  $("input[name=curativoCirurgicoOp]").eq(d).val();
                }
            }
            mobilidadeMembros = $("select[name=mobilidadeMembros]").val();
            mobilidadeMembrosOp = "";
            for(var e = 0; e <= $("input[name=mobilidadeMembrosOp]").length; e++)
            {
                if($("input[name=mobilidadeMembrosOp]").eq(e).is(":checked") === true)
                {
                    mobilidadeMembrosOp =  $("input[name=mobilidadeMembrosOp]").eq(e).val();
                }
            }
            prescricaoMedica = $("select[name=prescricaoMedica]").val();
            avisadoMedico = $("select[name=avisadoMedico]").val();
            fichaETRP = $("select[name=fichaETRP]").val();
            fichaETRPOp = "";
            for(var f = 0; f <= $("input[name=fichaETRPOp]").length; f++)
            {
                if($("input[name=fichaETRPOp]").eq(f).is(":checked") === true)
                {
                    fichaETRPOp =  $("input[name=fichaETRPOp]").eq(f).val();
                }
            }
            oberFichaETRP = $("textarea[name=oberFichaETRP]").val();
            acessoVP = $("select[name=acessoVP]").val();
            acessoVPOp = "";
            for(var g = 0; g <= $("input[name=acessoVPOp]").length; g++)
            {
                if($("input[name=acessoVPOp]").eq(g).is(":checked") === true)
                {
                    acessoVPOp =  $("input[name=acessoVPOp]").eq(g).val();
                }
            }
            oberAcessoVP = $("textarea[name=oberAcessoVP]").val();
            pacienteRDA = $("select[name=pacienteRDA]").val();
            pacienteRDAOp = "";
            for(var h = 0; h <= $("input[name=pacienteRDAOp]").length; h++)
            {
                if($("input[name=pacienteRDAOp]").eq(h).is(":checked") === true)
                {
                    pacienteRDAOp =  $("input[name=pacienteRDAOp]").eq(h).val();
                }
            }
            recomendacaoEspecial = $("select[name=recomendacaoEspecial]").val();
            oberRecomendacaoEspecial = $("textarea[name=oberRecomendacaoEspecial]").val();
            
            if(true)
            {
                if(idPos1 > 0)
                {
                    metodo = "update";
                }
                else
                {
                    metodo = "add";
                }
                $.ajax({
                    url: 'php/ajax/pos1.php',
                    type: 'POST',
                     data: {
                            metodo: metodo,
                            idPos1:idPos1,
                            $idCirurgia:$idCirurgia,
                            nivelConsciencia: nivelConsciencia,
                            nivelConscienciaOp: nivelConscienciaOp,
                            sinaisVE: sinaisVE,
                            oberSinaisVE: oberSinaisVE,
                            nauseaVomito: nauseaVomito,
                            oberNauseaVomito: oberNauseaVomito,
                            tipoAnestesia: tipoAnestesia,
                            tipoAnestesiaOp: tipoAnestesiaOp,
                            CPPTE: CPPTE,
                            CPPTEOp: CPPTEOp,
                            sistemaDrenagem: sistemaDrenagem,
                            sistemaDrenagemOp: sistemaDrenagemOp,
                            oberSistemaDrenagem: oberSistemaDrenagem,
                            curativoCirurgico: curativoCirurgico,
                            curativoCirurgicoOp: curativoCirurgicoOp,
                            mobilidadeMembros: mobilidadeMembros,
                            mobilidadeMembrosOp: mobilidadeMembrosOp,
                            prescricaoMedica: prescricaoMedica,
                            avisadoMedico: avisadoMedico,
                            fichaETRP: fichaETRP,
                            fichaETRPOp: fichaETRPOp,
                            oberFichaETRP: oberFichaETRP,
                            acessoVP: acessoVP,
                            acessoVPOp: acessoVPOp,
                            oberAcessoVP: oberAcessoVP,
                            pacienteRDA: pacienteRDA,
                            pacienteRDAOp: pacienteRDAOp,
                            recomendacaoEspecial: recomendacaoEspecial,
                            oberRecomendacaoEspecial: oberRecomendacaoEspecial
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