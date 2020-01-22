function getTrans12()
        {
            $.ajax({
                url: 'php/ajax/trans1.1.php',
                type: 'POST',
                 data: {
                        metodo: "getTrans1",
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
                        idTrans1_2 = data.msg[0].idTRANS1_1;
                        var re = /\s*,\s*/;
                        var nameList1 = data.msg[0].CAEEC.split(re);
                        
                        for(var x = 0; x <= nameList1.length; x++)
                        {
                            for(var i = 0; i <= $("input[name=CAEEC]").length; i++)
                            {
                                if(nameList1[x] === $("input[name=CAEEC]").eq(i).val())
                                {
                                    $("input[name=CAEEC]").eq(i).prop("checked", true);
                                }
                            }
                        }
                        
                        $("select[name=staff]").val(data.msg[0].STAFF);
                        $("select[name=1cirurgiao]").val(data.msg[0].CIRURGIAO1);
                        $("select[name=2cirurgiao]").val(data.msg[0].CIRURGIAO2);
                        $("select[name=anestesista]").val(data.msg[0].ANESTESISTA);
                        $("select[name=circulante]").val(data.msg[0].CIRCULANTE);
                        $("select[name=placaEletrocauterio]").val(data.msg[0].PLACAELETROCAUTERIO);
                        $("select[name=UAP]").val(data.msg[0].UAP);
                        $("select[name=EID]").val(data.msg[0].EID);
                        $("select[name=sanguineas]").val(data.msg[0].SANGUINEAS);
                        $("select[name=revisaoAnestesista]").val(data.msg[0].REVISAOANESTESISTA);
                        $("select[name=FEEP]").val(data.msg[0].FEEP);
                        $("textarea[name=obserTrans12]").val(data.msg[0].OBSERVACAO);
                    }
                },
            });
        }
        
        $(document).on("click", ".btnCriarTrans12", function(){
            $CAEEC = "";
            for(var x = 0; x <= $("input[name=CAEEC]").length; x++)
            {
                if($("input[name=CAEEC]").eq(x).is(":checked") === true)
                {
                    $CAEEC += $("input[name=CAEEC]").eq(x).val()+",";
                }
            }
            
            $staff = $("select[name=staff]").val();
            $1cirurgiao = $("select[name=1cirurgiao]").val();
            $2cirurgiao = $("select[name=2cirurgiao]").val();
            $anestesista = $("select[name=anestesista]").val();
            $circulante = $("select[name=circulante]").val();
            $placaEletrocauterio = $("select[name=placaEletrocauterio]").val();
            $UAP = $("select[name=UAP]").val();
            $EID = $("select[name=EID]").val();
            $sanguineas = $("select[name=sanguineas]").val();
            $revisaoAnestesista = $("select[name=revisaoAnestesista]").val();
            $FEEP = $("select[name=FEEP]").val();
            $obser = $("textarea[name=obserTrans12]").val();
            
            
            var metodo;
            
            if($idCirurgia !== "" && $staff !== "" && $1cirurgiao !== "" && $2cirurgiao !== "" && $anestesista !== "" && $circulante !== "" && $placaEletrocauterio !== "" &&
               $UAP !== "" && $EID !== "" && $sanguineas !== "" && $revisaoAnestesista !== "" && $FEEP !== ""  && $obser !== "" )
            {
                if(idTrans1_2 > 0)
                {
                    metodo = "update";
                }
                else
                {
                    metodo = "add";
                }
                $.ajax({
                    url: 'php/ajax/trans1.1.php',
                    type: 'POST',
                     data: {
                            metodo: metodo,
                            idTrans1_2:idTrans1_2,
                            idCirurgia:$idCirurgia,
                            staff: $staff,
                            cirurgiao1: $1cirurgiao,
                            cirurgiao2: $2cirurgiao,
                            anestesista: $anestesista,
                            circulante: $circulante,
                            placaEletrocauterio: $placaEletrocauterio,
                            UAP:$UAP,
                            EID: $EID,
                            CAEEC: $CAEEC,
                            sanguineas: $sanguineas,
                            revisaoAnestesista: $revisaoAnestesista,
                            FEEP: $FEEP,
                            obser: $obser
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