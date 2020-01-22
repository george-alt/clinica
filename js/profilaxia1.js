$(document).on("click","input[name=tipoRisco]",function(){
            if($(this).val() === "1")
            {
                //3
                $("select[name=endoscopia]").prop( "disabled",true);
                $("select[name=laparoscopia]").prop( "disabled",true);
                $("select[name=superficial]").prop( "disabled",true);
                $("select[name=oftalmologia]").prop( "disabled",true);
                $("select[name=otorrinolaringologia]").prop( "disabled",true);
                $("textarea[name=outras]").prop( "disabled",true);
                
                //2
                $("select[name=idade]").prop( "disabled",true);
                $("select[name=fatoresRTEV]").prop( "disabled",true);
                
                //1
                $("select[name=astroplastiaQuadril]").prop( "disabled",false);
                $("select[name=astroplastiaJoelho]").prop( "disabled",false);
                $("select[name=faturaQuadril]").prop( "disabled",false);
                $("select[name=ontologicaCurativo]").prop( "disabled",false);
                $("select[name=treumaRequimedular]").prop( "disabled",false);
                $("select[name=plitreuma]").prop( "disabled",false);
                
                nivelRisco(false, true, true);
            }
            else if($(this).val() === "2")
            {
                //1
                $("select[name=astroplastiaQuadril]").prop( "disabled",true);
                $("select[name=astroplastiaJoelho]").prop( "disabled",true);
                $("select[name=faturaQuadril]").prop( "disabled",true);
                $("select[name=ontologicaCurativo]").prop( "disabled",true);
                $("select[name=treumaRequimedular]").prop( "disabled",true);
                $("select[name=plitreuma]").prop( "disabled",true);
                
                //3
                $("select[name=endoscopia]").prop( "disabled",true);
                $("select[name=laparoscopia]").prop( "disabled",true);
                $("select[name=superficial]").prop( "disabled",true);
                $("select[name=oftalmologia]").prop( "disabled",true);
                $("select[name=otorrinolaringologia]").prop( "disabled",true);
                $("textarea[name=outras]").prop( "disabled",true);
                
                //2
                $("select[name=idade]").prop( "disabled",false);
                $("select[name=fatoresRTEV]").prop( "disabled",false);
                
                nivelRisco(true, true, true);
            }
            else
            {
                //1
                $("select[name=astroplastiaQuadril]").prop( "disabled",true);
                $("select[name=astroplastiaJoelho]").prop( "disabled",true);
                $("select[name=faturaQuadril]").prop( "disabled",true);
                $("select[name=ontologicaCurativo]").prop( "disabled",true);
                $("select[name=treumaRequimedular]").prop( "disabled",true);
                $("select[name=plitreuma]").prop( "disabled",true);
                
                //2
                $("select[name=idade]").prop( "disabled",true);
                $("select[name=fatoresRTEV]").prop( "disabled",true);
                
                //3
                $("select[name=endoscopia]").prop( "disabled",false);
                $("select[name=laparoscopia]").prop( "disabled",false);
                $("select[name=superficial]").prop( "disabled",false);
                $("select[name=oftalmologia]").prop( "disabled",false);
                $("select[name=otorrinolaringologia]").prop( "disabled",false);
                $("textarea[name=outras]").prop( "disabled",false);
                
                nivelRisco(true, true, false);
            }
            
            $("input[name=nivelRisco]").eq(0).prop("checked",false);
            $("input[name=nivelRisco]").eq(1).prop("checked",false);
            $("input[name=nivelRisco]").eq(2).prop("checked",false);
            contraIndicacao(true);
            
        });
        
        $(document).on("change","select[name=idade]",function(){
            if($(this).val() === "Maior que 60 anos")
            {
                $("select[name=fatoresRTEV]").prop("disabled",true);
                nivelRisco(false, true, true);
            }
            else if($(this).val() === "Entre 40 a 60 anos")
            {
                $("select[name=fatoresRTEV]").prop("disabled",false);
                if($("select[name=fatoresRTEV]").val() === "Sim")
                {
                    nivelRisco(false, true, true);
                }
                else
                {
                    nivelRisco(true, false, true);
                }
            }
            else
            {
                $("select[name=fatoresRTEV]").prop("disabled",false);
                if($("select[name=fatoresRTEV]").val() === "Sim")
                {
                    nivelRisco(true, false, true);
                }
                else
                {
                    nivelRisco(true, true, false);
                }
            }
            
            $("input[name=nivelRisco]").eq(0).prop("checked",false);
            $("input[name=nivelRisco]").eq(1).prop("checked",false);
            $("input[name=nivelRisco]").eq(2).prop("checked",false);
            contraIndicacao(true);
        });
        
        $(document).on("change","select[name=fatoresRTEV]",function(){
            if($("select[name=idade]").val() === "Entre 40 a 60 anos")
            {
                if($(this).val() === "Sim")
                {
                    nivelRisco(false, true, true);
                }
                else
                {
                    nivelRisco(true, false, true);
                }
            }
            else
            {
                if($(this).val() === "Sim")
                {
                    nivelRisco(true, false, true);
                }
                else
                {
                    nivelRisco(true, true, false);
                }
            }
            
            $("input[name=nivelRisco]").eq(0).prop("checked",false);
            $("input[name=nivelRisco]").eq(1).prop("checked",false);
            $("input[name=nivelRisco]").eq(2).prop("checked",false);
            contraIndicacao(true);
        });
        
        
        $(document).on("click","#nivelRisco1",function(){
            contraIndicacao(false);
        });
        $(document).on("click","#nivelRisco2",function(){
            contraIndicacao(false);
        });
        $(document).on("click","#nivelRisco3",function(){
            nivelRisco(true, true, false);
        });
        
        function nivelRisco(alto, medio, baixo)
        {
            if(alto === true){$("input[name=nivelRisco]").eq(0).prop("disabled",true);$(".labelNivelRisco1").removeClass("stylenivelRisco");}
            else{$("input[name=nivelRisco]").eq(0).prop("disabled",false);$(".labelNivelRisco1").addClass("stylenivelRisco");}
            if(medio === true){$("input[name=nivelRisco]").eq(1).prop("disabled",true);$(".labelNivelRisco2").removeClass("stylenivelRisco");}
            else{$("input[name=nivelRisco]").eq(1).prop("disabled",false);$(".labelNivelRisco2").addClass("stylenivelRisco");}
            if(baixo === true){$("input[name=nivelRisco]").eq(2).prop("disabled",true);$(".labelNivelRisco3").removeClass("stylenivelRisco");}
            else{$("input[name=nivelRisco]").eq(2).prop("disabled",false);$(".labelNivelRisco3").addClass("stylenivelRisco");}
        }
        
        function contraIndicacao(a)
        {
            if(a)
            {
                $("select[name=sangramentoAtivo]").prop( "disabled",true);
                $("select[name=ulceraPA]").prop( "disabled",true);
                $("select[name=cirurgiaCO2S]").prop( "disabled",true);
                $("select[name=alergiaPPH]").prop( "disabled",true);
                $("select[name=coagulopatia]").prop( "disabled",true);
                $("select[name=coleteLCR]").prop( "disabled",true);
                $("select[name=insuficienciaRenal]").prop( "disabled",true);
                $("select[name=HASNC]").prop( "disabled",true);
            }
            else
            {
                $("select[name=sangramentoAtivo]").prop( "disabled",false);
                $("select[name=ulceraPA]").prop( "disabled",false);
                $("select[name=cirurgiaCO2S]").prop( "disabled",false);
                $("select[name=alergiaPPH]").prop( "disabled",false);
                $("select[name=coagulopatia]").prop( "disabled",false);
                $("select[name=coleteLCR]").prop( "disabled",false);
                $("select[name=insuficienciaRenal]").prop( "disabled",false);
                $("select[name=HASNC]").prop( "disabled",false);
            }
        }
        
        
        astroplastiaQuadril = "";
        astroplastiaJoelho  = "";
        faturaQuadril = "";
        ontologicaCurativo = "";
        treumaRequimedular = "";
        plitreuma = "";
        idade = "";
        fatoresRTEV = "";
        endoscopia = "";
        laparoscopia = "";
        superficial = "";
        oftalmologia = "";
        otorrinolaringologia = "";
        outras = "";
        varnivelRisco = "";
        sangramentoAtivo = "";
        ulceraPA = "";
        cirurgiaCO2S = "";
        alergiaPPH = "";
        coagulopatia = "";
        coleteLCR = "";
        insuficienciaRenal = "";
        HASNC = "";
        
        function profilaxia1()
        {
            $.ajax({
                url: 'php/ajax/profilaxia1.php',
                type: 'POST',
                 data: {
                        metodo: "getProfilaxia1",
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
                        idProfilaxia1 = data.msg[0].idPROFILAXIA1;
                        
                        if(data.msg[0].TIPORISCO === "1")
                        {
                            $("#CARisco_active1").prop("checked", true);
                            
                            $("select[name=astroplastiaQuadril]").val(data.msg[0].astroplastiaQuadril);
                            $("select[name=astroplastiaJoelho]").val(data.msg[0].astroplastiaJoelho);
                            $("select[name=faturaQuadril]").val(data.msg[0].faturaQuadril);
                            $("select[name=ontologicaCurativo]").val(data.msg[0].ontologicaCurativo);
                            $("select[name=treumaRequimedular]").val(data.msg[0].treumaRequimedular);
                            $("select[name=plitreuma]").val(data.msg[0].plitreuma);
                            
                            $("select[name=astroplastiaQuadril]").prop( "disabled",false);
                            $("select[name=astroplastiaJoelho]").prop( "disabled",false);
                            $("select[name=faturaQuadril]").prop( "disabled",false);
                            $("select[name=ontologicaCurativo]").prop( "disabled",false);
                            $("select[name=treumaRequimedular]").prop( "disabled",false);
                            $("select[name=plitreuma]").prop( "disabled",false);
                        }
                        else if(data.msg[0].TIPORISCO === "2")
                        {
                            $("#CARisco_active2").prop("checked", true);
                            $("select[name=idade]").val(data.msg[0].idade);
                            $("select[name=fatoresRTEV]").val(data.msg[0].fatoresRTEV);
                            
                            $("select[name=idade]").prop( "disabled",false);
                            $("select[name=fatoresRTEV]").prop( "disabled",false);
                        }
                        else if(data.msg[0].TIPORISCO === "3")
                        {
                            $("#CARisco_active3").prop("checked", true);
                            
                            $("select[name=endoscopia]").val(data.msg[0].endoscopia);
                            $("select[name=laparoscopia]").val(data.msg[0].laparoscopia);
                            $("select[name=superficial]").val(data.msg[0].superficial);
                            $("select[name=oftalmologia]").val(data.msg[0].oftalmologia);
                            $("select[name=otorrinolaringologia]").val(data.msg[0].otorrinolaringologia);
                            $("textarea[name=outras]").val(data.msg[0].outras);
                            
                            $("select[name=endoscopia]").prop( "disabled",false);
                            $("select[name=laparoscopia]").prop( "disabled",false);
                            $("select[name=superficial]").prop( "disabled",false);
                            $("select[name=oftalmologia]").prop( "disabled",false);
                            $("select[name=otorrinolaringologia]").prop( "disabled",false);
                            $("textarea[name=outras]").prop( "disabled",false);
                        }
                        
                        if(data.msg[0].varnivelRisco === "1")
                        {
                            nivelRisco(false, true, true);
                            $("#nivelRisco1").prop("checked", true);
                        }
                        else if(data.msg[0].varnivelRisco === "2")
                        {
                            nivelRisco(true, false, true);
                            $("#nivelRisco2").prop("checked", true);
                        }
                        else if(data.msg[0].varnivelRisco === "3")
                        {
                            nivelRisco(true, true, false);
                            $("#nivelRisco3").prop("checked", true);
                        }
                        
                        if(data.msg[0].varnivelRisco === "1" || data.msg[0].varnivelRisco === "2")
                        {
                            $("select[name=sangramentoAtivo]").val(data.msg[0].sangramentoAtivo);
                            $("select[name=ulceraPA]").val(data.msg[0].ulceraPA);
                            $("select[name=cirurgiaCO2S]").val(data.msg[0].cirurgiaCO2S);
                            $("select[name=alergiaPPH]").val(data.msg[0].alergiaPPH);
                            $("select[name=coagulopatia]").val(data.msg[0].coagulopatia);
                            $("select[name=coleteLCR]").val(data.msg[0].coleteLCR);
                            $("select[name=insuficienciaRenal]").val(data.msg[0].insuficienciaRenal);
                            $("select[name=HASNC]").val(data.msg[0].HASNC);
                            
                            contraIndicacao(false);
                        }
                        
                    }
                },
            });
        }
        
        $(document).on("click", ".btnCriarProfilaxia1", function(){
            
            tipoRisco = "";
            
            for(var i = 0; i <= $("input[name=tipoRisco]").length; i++)
            {
                if($("input[name=tipoRisco]").eq(i).is(":checked") === true)
                {
                    tipoRisco = $("input[name=tipoRisco]").eq(i).val();
                }
            }
            
            if($("input[name=tipoRisco]").eq(0).is(":checked"))
            {
                astroplastiaQuadril = $("select[name=astroplastiaQuadril]").val();
                astroplastiaJoelho  = $("select[name=astroplastiaJoelho]").val();
                faturaQuadril = $("select[name=faturaQuadril]").val();
                ontologicaCurativo = $("select[name=ontologicaCurativo]").val();
                treumaRequimedular = $("select[name=treumaRequimedular]").val();
                plitreuma = $("select[name=plitreuma]").val();
            }
            
            if($("input[name=tipoRisco]").eq(1).is(":checked"))
            {
                idade = $("select[name=idade]").val();
                fatoresRTEV = $("select[name=fatoresRTEV]").val();
            }
            
            if($("input[name=tipoRisco]").eq(2).is(":checked"))
            {
                endoscopia = $("select[name=endoscopia]").val();
                laparoscopia = $("select[name=laparoscopia]").val();
                superficial = $("select[name=superficial]").val();
                oftalmologia = $("select[name=oftalmologia]").val();
                otorrinolaringologia = $("select[name=otorrinolaringologia]").val();
                outras = $("textarea[name=outras]").val();
            }
            
            varnivelRisco = "";
            
            for(var x = 0; x <= $("input[name=nivelRisco]").length; x++)
            {
                if($("input[name=nivelRisco]").eq(x).is(":checked") === true)
                {
                    varnivelRisco =  $("input[name=nivelRisco]").val();
                }
            }
            
            if($("#nivelRisco1").is(":checked") || $("#nivelRisco2").is(":checked"))
            {
                sangramentoAtivo = $("select[name=sangramentoAtivo]").val();
                ulceraPA = $("select[name=ulceraPA]").val();
                cirurgiaCO2S = $("select[name=cirurgiaCO2S]").val();
                alergiaPPH = $("select[name=alergiaPPH]").val();
                coagulopatia = $("select[name=coagulopatia]").val();
                coleteLCR = $("select[name=coleteLCR]").val();
                insuficienciaRenal = $("select[name=insuficienciaRenal]").val();
                HASNC = $("select[name=HASNC]").val();
            }
            
            
            var metodo;
            
            if(tipoRisco !== "")
            {
                if(idProfilaxia1 > 0)
                {
                    metodo = "update";
                }
                else
                {
                    metodo = "add";
                }
                $.ajax({
                    url: 'php/ajax/profilaxia1.php',
                    type: 'POST',
                     data: {
                            metodo: metodo,
                            idProfilaxia1: idProfilaxia1,
                            idCirurgia:$idCirurgia,
                            tipoRisco:tipoRisco,
                            astroplastiaQuadril: astroplastiaQuadril,
                            astroplastiaJoelho: astroplastiaJoelho,
                            faturaQuadril: faturaQuadril,
                            ontologicaCurativo: ontologicaCurativo,
                            treumaRequimedular: treumaRequimedular,
                            plitreuma:plitreuma,
                            idade: idade,
                            fatoresRTEV: fatoresRTEV,
                            endoscopia: endoscopia,
                            laparoscopia: laparoscopia,
                            superficial: superficial,
                            oftalmologia: oftalmologia,
                            otorrinolaringologia:otorrinolaringologia,
                            outras: outras,
                            varnivelRisco:varnivelRisco,
                            sangramentoAtivo: sangramentoAtivo,
                            ulceraPA: ulceraPA,
                            cirurgiaCO2S: cirurgiaCO2S,
                            alergiaPPH: alergiaPPH,
                            coagulopatia: coagulopatia,
                            coleteLCR: coleteLCR,
                            insuficienciaRenal: insuficienciaRenal,
                            HASNC: HASNC
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