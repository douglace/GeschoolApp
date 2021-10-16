<!DOCTYPE html>
<html dir="ltr" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Gescabac - Le logiciel de gestion d'école</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<![endif]-->
</head>

<body>
    <style>
        * {
            font-size: 14px !important;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            padding: 0;
            margin-bottom: 5px;
            font-size: 14px !important;
        }

        .table-1 {
            margin-top: 5px;
            width: 90%;
            height: 50px;
            text-align: center;
            vertical-align: bottom;
            margin-left: auto;
            margin-right: auto;
            font-size: 16px;
            border-collapse: collapse;
        }

        .table-1 th {
            border: 0.5px solid rgb(160, 156, 156);
        }

        .table-1 td {
            border: 0.5px solid rgb(160, 156, 156);
        }

        .secondtable {
            width: calc(100%/3);
            box-sizing: border-box;
            margin: 10px 10px 10px 0;
        }

        .content-blog {
            width: 90%;
            margin: 5px auto;
            display: flex;
            flex-direction: row;
        }

        .div-content {
            width: 90%;
            margin: 0 auto;
            box-sizing: border-box;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .div-content h6 {
            font-size: 20px;
        }

        .div-content h6 input {
            width: 20px;
            height: 20px
        }

        .div-1 div {
            text-align: center;
        }

        .fin-page {
            page-break-after: always;
        }

    </style>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    @foreach ($bulletins as $bulletin)
        @php
            $effectif = count($bulletins);
        @endphp
        <div style="margin-bottom:100px">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="div-1 div-content" style="margin-top: 5px; margin-bottom: 30px;">
                <div>
                    <h5><strong>RÉPUBLIQUE DU CAMEROUN</strong></h5>
                    <h6>Paix - Travail - Patrie</h6>
                    <h6>-----oo-----</h6>
                    <h6>Péres Piaristes</h6>
                    <h6>COMPLEXE ACADEMIQUE BILINQUE <br> SAINT JOSEPH CALASANZ</h6>
                    <h6><em>Pietas et Litterae</em></h6>
                    <h6>BP : 2450 YAOUNDE</h6>
                    <h6>Tel : 654822081/699504154</h6>
                </div>
                <div>
                    <img src="logo.jpeg" alt="logo" width="150px" height="150px" style="margin-bottom: 10px;">
                    <h4> </h4>
                    <H3 style="margin-top: 50px;"><strong>BULLETIN DE NOTE / REPORT CARD</strong></H4>
                        <h4 style="text-transform: uppercase;">{{ $trimestre->intitule }}</h4>
                </div>
                <div>
                    <h5><strong>REPUBLIC OF CAMEROON</strong></h5>
                    <h6>Peace - Work - Fatherland</h6>
                    <h6>-----oo-----</h6>
                    <h6>Piarist Fathers</h6>
                    <h6>SAINT JOSEPH CALASANZ <br> BILINGUAL ACADEMIC COMPLEX</h6>
                    <h6><em>Pietas et Litterae</em></h6>
                    <h6>BP : 2450 YAOUNDE</h6>
                    <h6>Tel : 654822081/699504154</h6>
                </div>
            </div>
            <div class="div-2 div-content">
                <div>
                    <h5>Nom et Prénom : <strong>{{ $bulletin->eleve->getFullName() }}</strong></h5>
                    <h5>Né(e) le : {{ $bulletin->eleve->date }}</strong> à
                        <strong>{{ $bulletin->eleve->lieu }}</strong></h5>
                    <h5>Matricule : <strong>{{ $bulletin->eleve->matricul }}</strong></h5>
                    <h5>Statut : <strong>{{ $bulletin->eleve->statut }}</strong></h5>
                </div>
                <div>
                    <h5>Classe : <strong style="text-transform: uppercase;">{{ $classe->intitule }}</strong></h5>
                    <h5>Effectif : <strong>{{ $effectif }}</strong></h5>
                    <h5>Prof Titulaire : <strong>{{ '' }}</strong></h5>
                    <h5>Année scolaire : <strong>{{ $bulletin->annee->debut . '/' . $bulletin->annee->fin }}</strong></h5>
                </div>
            </div>
            <table class="table-1">
                <thead style="border: 2px solid rgba(17, 17, 17, .8);">
                    <tr>
                        <th style="width: 25%;">DISCIPLINES</th>
                        @foreach ($trimestre->sequences as $sequence)
                            <th style="width: 7%;">SEQ {{ $sequence->numero }}</th>
                            <th style="width: 5%;">RANG</th>
                        @endforeach
                        <th style="width: 9%;">NOTES /20</th>
                        <th style="width:5%;">COEF</th>
                        <th style="width: 5%;">TOTAL</th>
                        <th style="width: 5%;">RANG</th>
                        <th style="width: 7.5%;">MENTION</th>
                    </tr>
                </thead>
                <tbody style="border: 2px solid rgba(17, 17, 17, .8);">

                    @php
                        $i = 0;
                        $coef_total = 0;
                        $note_total = 0;
                    @endphp
                    @foreach ($bulletin->notes as $note)
                        <tr>
                            <th style="width: 25%; font-size:12px"><strong
                                    style="font-size:16px">{{ $note->cours->matiere->intitule }}</strong>
                                <br>{{ $note->cours->enseignant->getFullName() }}
                            </th>
                            @php

                            @endphp

                            @foreach ($note->trimestre->sequences as $sequence)
                                @if ($note->eleve->getNoteSequence($sequence->sequence_id, $note->cours_id)->note == 0.1)
                                    <th style="width: 7%;"></th>
                                    <th style="width: 7%;"></th>
                                @else
                                    <th style="width: 7%;">
                                        {{ $note->eleve->getNoteSequence($sequence->sequence_id, $note->cours_id)->note }}
                                    </th>
                                    <th style="width: 7%;">
                                        {{ $note->eleve->getNoteSequence($sequence->sequence_id, $note->cours_id)->rang }}
                                    </th>
                                @endif
                            @endforeach

                            @if ($note->note == 0.1)
                                <th style="width: 5%;"></th>
                                <th style="width: 5%;"></th>
                                <th style="width: 5%;"></th>
                                <th style="width: 5%;"></th>
                                <th style="width: 7%;"></th>
                            @else
                                <th style="width: 5%;"> {{ $note->note }} </th>
                                <th style="width: 5%;">{{ $note->cours->coeficient }}</th>
                                <th style="width: 5%;">{{ $note->note * $note->cours->coeficient }}</th>
                                <th style="width: 5%;">{{ $note->rang }}</th>
                                <th style="width: 7%;">{{ $note->mention }}</th>
                                @php
                                    $coef_total += $note->cours->coeficient;
                                    $note_total += $note->note * $note->cours->coeficient;
                                @endphp
                            @endif

                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="1"> <br>
                            <h4 style="margin: 0;padding: 0;">MOYENNE TRIMESTIELLE</h4> <br>
                        </td>
                        @foreach ($bulletin->trimestre->sequences as $sequence)
                            <td colspan="1"> <br>
                                <h4 style="margin: 0;padding: 0;">
                                    {{ App\BulletinSequence::getWithEleve($bulletin->annee_id, $sequence->sequence_id, $bulletin->eleve_id)->moyenne == 0.1 ? '' : App\BulletinSequence::getWithEleve($bulletin->annee_id, $sequence->sequence_id, $bulletin->eleve_id)->moyenne }}
                                </h4> <br>
                            </td>
                            <td colspan="1"> <br>
                                <h4 style="margin: 0;padding: 0;">
                                    {{ App\BulletinSequence::getWithEleve($bulletin->annee_id, $sequence->sequence_id, $bulletin->eleve_id)->rang == 0 ? '' : App\BulletinSequence::getWithEleve($bulletin->annee_id, $sequence->sequence_id, $bulletin->eleve_id)->rang }}
                                </h4> <br>
                            </td>
                        @endforeach
                        @if ($bulletin->moyenne == 0.1)
                            <td colspan="1">
                                <h4 style="margin: 0;padding: 0;"> </h4>
                            </td>
                            <td colspan="1"> <br>
                                <h4 style="margin: 0;padding: 0;"> </h4><br>
                            </td>
                            <td colspan="1"> <br>
                                <h4 style="margin: 0;padding: 0;"> </h4> <br>
                            </td>
                            <td colspan="1"> <br>
                                <h4 style="margin: 0;padding: 0;"> <br>
                            </td>
                            <td colspan="1"> <br>
                                <h4 style="margin: 0;padding: 0;"> </h4> <br>
                            </td>
                        @else
                            <td colspan="1">
                                <h4 style="margin: 0;padding: 0;">{{ $bulletin->moyenne }}</h4>
                            </td>
                            <td colspan="1"> <br>
                                <h4 style="margin: 0;padding: 0;">{{ $coef_total }}</h4><br>
                            </td>
                            <td colspan="1"> <br>
                                <h4 style="margin: 0;padding: 0;">{{ $note_total }}</h4> <br>
                            </td>
                            <td colspan="1"> <br>
                                <h4 style="margin: 0;padding: 0;">{{ $bulletin->rang }}</h4> <br>
                            </td>
                            <td colspan="1"> <br>
                                <h4 style="margin: 0;padding: 0;">{{ $bulletin->mention }}</h4> <br>
                            </td>
                        @endif
                    </tr>
                </tbody>
            </table>


            <div class="content-blog" style="box-sizing: border-box;">
                <table class="table-1 secondtable">
                    <thead style="border: 2px solid rgba(17, 17, 17, .8);">
                        <tr>
                            <th style="width: 25%;" colspan="2">PROFIL DE LA CLASSE</th>
                        </tr>
                    </thead>
                    <tbody style="border: 2px solid rgba(17, 17, 17, .8);">
                        <tr>
                            <td style="width: 75%;">MOYENNE PREMIER(E)</td>
                            <td style="width: 25%;">{{ '' }}</td>
                        </tr>
                        <tr>
                            <td style="width: 75%;">MOYENNE DERNIER(E)</td>
                            <td style="width: 25%;">{{ '' }}</td>
                        </tr>
                        <tr>
                            <td style="width: 75%;">MOYENNE GENERALE</td>
                            <td style="width: 25%;">{{ '' }}</td>
                        </tr>
                    </tbody>
                </table>

                <table class="table-1 secondtable">
                    <thead style="border: 2px solid rgba(17, 17, 17, .8);">
                        <tr>
                            <th style="width: 25%;" colspan="2">DISCIPLINE</th>
                        </tr>
                    </thead>
                    <tbody style="border: 2px solid rgba(17, 17, 17, .8);">
                        <tr>
                            <td style="width: 85%;">ABSENCES JUSTIFIÉES</td>
                            <td style="width: 15%;"></td>
                        </tr>
                        <tr>
                            <td style="width: 85%;">ABSENCES NON JUSTIFIÉES</td>
                            <td style="width: 15%;"></td>
                        </tr>
                        <tr>
                            <td style="width: 85%;">ABSENCES TOTAL</td>
                            <td style="width: 15%;"></td>
                        </tr>
                    </tbody>
                </table>

                <table class="table-1 secondtable" style="margin-right: 0">
                    <thead style="border: 2px solid rgba(17, 17, 17, .8);">
                        <tr>
                            <th style="width: 25%;" colspan="2">RESULTATS DE L'ELEVE</th>
                        </tr>
                    </thead>
                    <tbody style="border: 2px solid rgba(17, 17, 17, .8);">
                        <tr>
                            <td style="width: 70%;">MOYENNE</td>
                            <td style="width: 30%;">{{ $bulletin->moyenne }}</td>
                        </tr>
                        <tr>
                            <td style="width: 70%;">RANG</td>
                            <td style="width: 30%;">{{ $bulletin->rang }}</td>
                        </tr>
                        <tr>
                            <td style="width: 70%;">MENTION</td>
                            <td style="width: 30%;">{{ $bulletin->mention }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="width: 80%;margin: 10px auto;">
                <h3 style="text-align: center;">DECISIONS DU CONSEIL DE CLASSE</h3>
            </div>
            <div class="div-content" style="justify-content: space-around;">
                <div>
                    <h6><input type="checkbox" name="" id="" value="true"> Tableau d'honneur (TH)</h6>
                    <h6><input type="checkbox" name="" id="" value="true"> Avertissement Travail</h6>
                </div>
                <div>
                    <h6><input type="checkbox" name="" id="" value="true"> Exclu pour Travail</h6>
                    <h6><input type="checkbox" name="" id="" value="true"> Avertissement Conduite</h6>
                    <h6><input type="checkbox" name="" id="" value="true"> Exclu pour Conduite</h6>
                </div>
            </div>
            <div style="width: 80%;margin: 10px auto;">
                <hr width="100%" size="10px" color="black">
                <h5 style="float: right; border-bottom:2px solid black;">Yaoundé Le {{ '' }}</h5>
            </div>
            <div class="div-content" style="justify-content: space-between;margin: 50px auto;">
                <div>
                    <h4>Parent</h4>
                </div>
                <div>
                    <h4>Principal</h4>
                </div>
            </div>

        </div>
        <!-- ============================================================== -->
        <div style="page-break-after: always;"></div>
    @endforeach

</body>

</html>
