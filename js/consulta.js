function getConsulta()
        {
            $.ajax({
                url: 'php/ajax/consulta.php',
                type: 'POST',
                 data: {
                        metodo: "getConsulta",
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
                        idCONSULTA = data.msg[0].idCONSULTA;
                        $("input[name=dataNacismento]").val(data.msg[0].DATANASC);
                        $("input[name=leito]").val(data.msg[0].LEITO);
                        $("input[name=dataInternacao]").val(data.msg[0].DATAINTERNACAO);
                        $("input[name=pcp]").val(data.msg[0].PCP);
                        $("input[name=pca]").val(data.msg[0].PCA);
                        $("input[name=pa]").val(data.msg[0].PA);
                        $("input[name=t]").val(data.msg[0].T);
                        $("input[name=f]").val(data.msg[0].F);
                        $("input[name=fr]").val(data.msg[0].FR);
                        $("select[name=comorbidades]").val(data.msg[0].COMORBIDADES);
                        $("textarea[name=especificarComorbidades]").val(data.msg[0].COMENTARIOCOMORBIDADES);
                        $("select[name=tabagista]").val(data.msg[0].TABAGISTA);
                        $("select[name=etilista]").val(data.msg[0].ETILISTA);
                        $("select[name=alergias]").val(data.msg[0].ALERGIAS);
                        $("textarea[name=especificarAlergias]").val(data.msg[0].COMENTARIOALERGIA);
                        $("select[name=rpi]").val(data.msg[0].RPI);
                        $("select[name=rdc]").val(data.msg[0].RDC);
                        $("input[name=examesDiponiveis]").val(data.msg[0].EXAMESDISPONIVEIS);
                        $("input[name=MedicacaoDomicilio]").val(data.msg[0].MEDICACAODOMICILIO);
                        $("input[name=cirurgiaAnterior]").val(data.msg[0].CIRURGIAANTERIOR);
                        if(data.msg[0].STATUS === "0")
                        {
                            statusNivel = 1;
                        }
                        else
                        {
                            statusNivel = 0;
                        }
                        $("input[name=status]").eq(statusNivel).prop("checked", true);
                    }
                },
            });
        }
        
        //consulta
        $(document).on("click", ".btnCriarConsulta", function(){
            
            if($idCirurgia === 0 && $idPaciente === 0)
            {
                return toastr.warning("Selecione uma cirurgia.", "Alerta");
            }
            $dataNacismento = $("input[name=dataNacismento]").val();
            $leito = $("input[name=leito]").val();
            $dataInternacao = $("input[name=dataInternacao]").val();
            $pcp = $("input[name=pcp]").val();
            $pca = $("input[name=pca]").val();
            $pa = $("input[name=pa]").val();
            $t = $("input[name=t]").val();
            $f = $("input[name=f]").val();
            $fr = $("input[name=fr]").val();
            $comorbidades = $("select[name=comorbidades]").val();
            $especificarComorbidades = $("textarea[name=especificarComorbidades]").val();
            $tabagista = $("select[name=tabagista]").val();
            $etilista = $("select[name=etilista]").val();
            $alergias = $("select[name=alergias]").val();
            $especificarAlergias = $("textarea[name=especificarAlergias]").val();
            $rpi = $("select[name=rpi]").val();
            $rdc = $("select[name=rdc]").val();
            $examesDiponiveis = $("input[name=examesDiponiveis]").val();
            $MedicacaoDomicilio = $("input[name=MedicacaoDomicilio]").val();
            $cirurgiaAnterior = $("input[name=cirurgiaAnterior]").val();
            $status = $("input[name=status]").val();
            
            var metodo;
            
            if($dataNacismento !== "" && $leito !== "" && $dataInternacao !== "" && $pcp !== "" && $pca !== "" && $pa !== "" &&
               $t !== "" && $f !== "" && $fr !== "" && $comorbidades !== "" && $especificarComorbidades !== "" && $tabagista !== "" && $etilista !== "" &&
               $alergias !== "" && $especificarAlergias !== "" && $rpi !== "" && $rdc !== "" && $examesDiponiveis !== "" && $MedicacaoDomicilio !== "" && $status !== "")
            {
                if(idCONSULTA > 0)
                {
                    metodo = "update";
                }
                else
                {
                    metodo = "add";
                }
                $.ajax({
                    url: 'php/ajax/consulta.php',
                    type: 'POST',
                     data: {
                            metodo: metodo,
                            idCONSULTA: idCONSULTA,
                            idCirurgia:$idCirurgia,
                            dataNacismento: $dataNacismento,
                            leito: $leito,
                            dataInternacao: $dataInternacao,
                            pcp:$pcp,
                            pca:$pca,
                            pa:$pa,
                            t:$t,
                            f:$f,
                            fr:$fr,
                            comorbidades:$comorbidades,
                            especificarComorbidades:$especificarComorbidades,
                            tabagista:$tabagista,
                            etilista:$etilista,
                            alergias:$alergias,
                            especificarAlergias:$especificarAlergias,
                            rpi:$rpi,
                            rdc:$rdc,
                            examesDiponiveis: $examesDiponiveis,
                            MedicacaoDomicilio: $MedicacaoDomicilio,
                            cirurgiaAnterior:$cirurgiaAnterior,
                            status:$status
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