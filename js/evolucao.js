function getEvolucao()
        {
            $.ajax({
                url: 'php/ajax/evolucao.php',
                type: 'POST',
                 data: {
                        metodo: "getEvolucao",
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
                        idEvolucao = data.msg[0].idEVOLUCAO;
                        $("input[name=leitoEvol]").val(data.msg[0].LEITO);
                        $("input[name=origem]").val(data.msg[0].ORIGEM);
                        $("select[name=aberturaOcular]").val(data.msg[0].ABERTURAOCULAR);
                        $("select[name=respostaVerbal]").val(data.msg[0].RESPOSTAVERBAL);
                        $("select[name=respostaMotora]").val(data.msg[0].RESPOSTAMOTORA);
                        $("select[name=consciencia]").val(data.msg[0].CONSCIENCIA);
                        $("select[name=orientacao]").val(data.msg[0].ORIENTACAO);
                        $("input[name=descPulso]").val(data.msg[0].DESCRICAOPULSO);
                        $("select[name=pulso]").val(data.msg[0].PULSO);
                        $("input[name=descFc]").val(data.msg[0].DESCRICAOFC);
                        $("select[name=FCevol]").val(data.msg[0].FC);
                        $("input[name=descPa]").val(data.msg[0].DESCRICAOPA);
                        $("select[name=PAevol]").val(data.msg[0].PA);
                        $("input[name=descPadraoRespiratorio]").val(data.msg[0].DESCPADRAORESPIRATORIO);
                        $("select[name=padraoRespiratorio]").val(data.msg[0].PADRAORESPIRATORIO);
                        $("select[name=respiracao]").val(data.msg[0].RESPIRACAO);
                        $("select[name=abdomen]").val(data.msg[0].ABDOMEM);
                        $("select[name=RHA]").val(data.msg[0].RHA);
                        $("select[name=alimentacao]").val(data.msg[0].ALIMENTACAO);
                        $("input[name=residuos]").val(data.msg[0].RESIDUOS);
                        $("select[name=eliminacao]").val(data.msg[0].ELIMINACAO);
                        $("select[name=via]").val(data.msg[0].VIA);
                        $("input[name=descVia]").val(data.msg[0].DESCVIA);
                        $("select[name=diurese]").val(data.msg[0].DIURESE);
                        $("select[name=debito]").val(data.msg[0].DEBITO);
                        $("select[name=HD]").val(data.msg[0].HD);
                        $("select[name=sistemaEndocrino]").val(data.msg[0].HIPOGLICEMIANTES);
                        $("select[name=niveisGlicemicos]").val(data.msg[0].NIVEISGLICEMICOS);
                        $("select[name=cateteres]").val(data.msg[0].CATETERES);
                        $("select[name=sondas]").val(data.msg[0].SONDAS);
                        $("select[name=drenos]").val(data.msg[0].DRENOS);
                        $("select[name=curativos]").val(data.msg[0].CURATIVOS);
                        $("select[name=sistomas]").val(data.msg[0].SINTOMAS);
                        $("select[name=medicacao]").val(data.msg[0].MEDICACAO);
                        $("textarea[name=observacao]").val(data.msg[0].OBSERVACAO);
                    }
                },
            });
        }
        
         $(document).on("click", ".btnCriarEvolucao", function(){
            if($idCirurgia === 0 && $idPaciente === 0)
            {
                return toastr.warning("Selecione uma cirurgia.", "Alerta");
            }
           $leito = $("input[name=leitoEvol]").val();
        $origem = $("input[name=origem]").val();
        $aberturaOcular = $("select[name=aberturaOcular]").val();
        $respostaVerbal = $("select[name=respostaVerbal]").val();
        $respostaMotora = $("select[name=respostaMotora]").val();
        $consciencia = $("select[name=consciencia]").val();
        $orientacao = $("select[name=orientacao]").val();
        $descPulso = $("input[name=descPulso]").val();
        $pulso = $("select[name=pulso]").val();
        $descFc = $("input[name=descFc]").val();
        $FC = $("select[name=FCevol]").val();
        $descPa = $("input[name=descPa]").val();
        $PA = $("select[name=PAevol]").val();
        $descPadraoRespiratorio = $("input[name=descPadraoRespiratorio]").val();
        $padraoRespiratorio = $("select[name=padraoRespiratorio]").val();
        $respiracao = $("select[name=respiracao]").val();
        $abdomen = $("select[name=abdomen]").val();
        $RHA = $("select[name=RHA]").val();
        $alimentacao = $("select[name=alimentacao]").val();
        $residuos = $("input[name=residuos]").val();
        $eliminacao = $("select[name=eliminacao]").val();
        $via = $("select[name=via]").val();
        $descVia = $("input[name=descVia]").val();
        $diurese = $("select[name=diurese]").val();
        $debito = $("select[name=debito]").val();
        $HD = $("select[name=HD]").val();
        $sistemaEndocrino = $("select[name=sistemaEndocrino]").val();
        $niveisGlicemicos = $("select[name=niveisGlicemicos]").val();
        $cateteres = $("select[name=cateteres]").val();
        $sondas = $("select[name=sondas]").val();
        $drenos = $("select[name=drenos]").val();
        $curativos = $("select[name=curativos]").val();
        $sistomas = $("select[name=sistomas]").val();
        $medicacao = $("select[name=medicacao]").val();
        $observacao = $("textarea[name=observacao]").val();
        
        
        var metodo;
        
        if(true)
        {
            if(idEvolucao > 0)
            {
                metodo = "update";
            }
            else
            {
                metodo = "add";
            }
            $.ajax({
                url: 'php/ajax/evolucao.php',
                type: 'POST',
                 data: {
                        metodo: metodo,
                        idEvolucao:idEvolucao,
                        idCirurgia : $idCirurgia,
                        leito:$leito,
                        origem:$origem,
                        aberturaOcular:$aberturaOcular,
                        respostaVerbal:$respostaVerbal,
                        respostaMotora:$respostaMotora,
                        consciencia:$consciencia,
                        orientacao:$orientacao,
                        descPulso:$descPulso,
                        pulso:$pulso,
                        descFc:$descFc,
                        FC:$FC,
                        descPa:$descPa,
                        PA:$PA,
                        descPadraoRespiratorio:$descPadraoRespiratorio,
                        padraoRespiratorio:$padraoRespiratorio,
                        respiracao:$respiracao,
                        abdomen:$abdomen,
                        RHA:$RHA,
                        alimentacao:$alimentacao,
                        residuos:$residuos,
                        eliminacao:$eliminacao,
                        via:$via,
                        descVia:$descVia,
                        diurese:$diurese,
                        debito:$debito,
                        HD:$HD,
                        sistemaEndocrino:$sistemaEndocrino,
                        niveisGlicemicos:$niveisGlicemicos,
                        cateteres:$cateteres,
                        sondas:$sondas,
                        drenos:$drenos,
                        curativos:$curativos,
                        sistomas:$sistomas,
                        medicacao:$medicacao,
                        observacao:$observacao
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