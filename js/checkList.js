function getCheckList()
        {
            $.ajax({
                url: 'php/ajax/checkList.php',
                type: 'POST',
                 data: {
                        metodo: "getCheckList",
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
                        idCHECKLIST = data.msg[0].idCHECKLIST;
                        $("select[name=idenCliente]").val(data.msg[0].IDENTIFICACAOCLIENTE);
                        $("select[name=pronCompleto]").val(data.msg[0].PRONTUARIOCOMPLETO);
                        $("select[name=SCD]").val(data.msg[0].SCD);
                        $("select[name=CAA]").val(data.msg[0].CAA);
                        $("select[name=conCirurgico]").val(data.msg[0].CONSENTIMENTOCIRURGICO);
                        $("select[name=conTransfunsional]").val(data.msg[0].CONSENTIMENTOTRANSFUSIONAL);
                        $("select[name=banho]").val(data.msg[0].BANHO);
                        $("input[name=horaBanho]").val(data.msg[0].HORABANHO);
                        $("select[name=tricotomia]").val(data.msg[0].TRICOTOMIA);
                        $("input[name=triHora]").val(data.msg[0].TRICOTOMIAHORA);
                        $("input[name=triLocal]").val(data.msg[0].TRICOTOMIALOCAL);
                        $("select[name=jejum]").val(data.msg[0].JEJUM);
                        $("input[name=JejumInicio]").val(data.msg[0].JEJUMINICIO);
                        $("select[name=exames]").val(data.msg[0].EXAMES);
                        $("select[name=RPA]").val(data.msg[0].RPA);
                        $("select[name=tipoPrecaucao]").val(data.msg[0].TIPOPRECAUCAO);
                    }
                },
            });
        }
         $(document).on("click", ".btnCriarCheckList", function(){
        
        $idenCliente = $("select[name=idenCliente]").val();
        $pronCompleto = $("select[name=pronCompleto]").val();
        $SCD = $("select[name=SCD]").val();
        $CAA = $("select[name=CAA]").val();
        $conCirurgico = $("select[name=conCirurgico]").val();
        $conTransfunsional = $("select[name=conTransfunsional]").val();
        $banho = $("select[name=banho]").val();
        $horaBanho = $("input[name=horaBanho]").val();
        $tricotomia = $("select[name=tricotomia]").val();
        $triHora = $("input[name=triHora]").val();
        $triLocal = $("input[name=triLocal]").val();
        $jejum = $("select[name=jejum]").val();
        $JejumInicio = $("input[name=JejumInicio]").val();
        $exames = $("select[name=exames]").val();
        $RPA = $("select[name=RPA]").val();
        $tipoPrecaucao = $("select[name=tipoPrecaucao]").val();
        
        var metodo;
        
        if($idenCliente !== "" && $pronCompleto !== "" && $SCD !== "" && $CAA !== "" && $conCirurgico !== "" && $conTransfunsional !== "" && $banho !== "" &&
           $tricotomia !== "" && $triHora !== "" && $triLocal !== "" && $jejum !== "" && $JejumInicio !== "" && $exames !== "" && $RPA !== "" && $tipoPrecaucao !== "")
        {
            if(idCHECKLIST > 0)
            {
                metodo = "update";
            }
            else
            {
                metodo = "add";
            }
            $.ajax({
                url: 'php/ajax/checkList.php',
                type: 'POST',
                 data: {
                        metodo: metodo,
                        idCHECKLIST:idCHECKLIST,
                        idCirurgia:$idCirurgia,
                        idenCliente: $idenCliente,
                        pronCompleto: $pronCompleto,
                        SCD: $SCD,
                        CAA: $CAA,
                        conCirurgico: $conCirurgico,
                        conTransfunsional: $conTransfunsional,
                        banho: $banho,
                        horaBanho: $horaBanho,
                        tricotomia: $tricotomia,
                        triHora: $triHora,
                        triLocal: $triLocal,
                        jejum: $jejum,
                        JejumInicio:$JejumInicio,
                        exames:$exames,
                        rpa:$RPA,
                        tipoPrecaucao: $tipoPrecaucao
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
            $("select").css({"border":"red solid 1px"});
            toastr.warning("Informe todos os campos", "Alerta");
            
        }
        
    });