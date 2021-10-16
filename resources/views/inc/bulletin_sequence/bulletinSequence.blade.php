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
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->

    <div style="margin-bottom:100px; margin-top:20px">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="div-1 div-content" style="margin-top: 5px; margin-bottom: 5px;">
            <div style="margin-left: 40px ">
                <h5>ORDRE DES ÉCOLES PIES (PÈRES PIARISTES)</h5>
                <h6>LES ÉCOLES PIES EN AFRIQUE CENTRALE</h6>
                <h6>COMPLEXE ACADEMIQUE BILINQUE <br> SAINT JOSEPH CALASANZ</h6>
                <hr style="border: 1px black solid; opacity:0.3;">
            </div>
            <div>
                <img src="logo.jpeg" alt="logo" width="150px" height="150px" style="margin-bottom: 10px;">
                <h4> </h4>
                <H4 style="margin-top: 50px;">FICHE RECAPITULATIF DES NOTES / MARKS SHEET</H4>
                <h5 style="text-transform: uppercase;">{{ $sequence->intitule }}</h5>
            </div>
            <div style="margin-right: 40px ">
                <h5>ORDER OF THE PIOUS SCHOOLS (PIARIST FATHERS)</h5>
                <h6>PIOUS SCHOOLS IN CENTRAL AFRICA</h6>
                <h6>SAINT JOSEPH CALASANZ <br> BILINGUAL ACADEMIC COMPLEX</h6>
                <hr style="border: 1px black solid; opacity:0.3;">
            </div>
        </div>

        <div class="div-2 div-content">
        </div>

        <table class="table-1">
            <thead>
                <tr>
                    <th style="" colspan="1000">
                        <h5><strong style="text-transform: uppercase;">{{ $classe->intitule }}</strong></h5>
                    </th>
                </tr>
                <tr>
                    <th style="">NAME <br> /SUBJECTS</th>
                    @foreach ($bulletins[0]->notes as $note)
                        <th style="text-transform: uppercase">{{ $note->cours->matiere->intitule }}</th>
                    @endforeach
                    <th>TOTAL</th>
                    <th>MOYENNE</th>
                    <th>RANG</th>
                    <th>MENTION</th>
                    <th>SIGNATURE DES ELEVES</th>
                </tr>
                <tr>
                    <th style="">COEFFICIENT</th>
                    @php
                        $somme_coef = 0;
                    @endphp
                    @foreach ($bulletins[0]->notes as $note)
                        <th>{{ $note->cours->coeficient }}</th>
                        @php
                            $somme_coef += $note->cours->coeficient;
                        @endphp
                    @endforeach
                    <th>{{ $somme_coef }}</th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                </tr>

            </thead>
            <tbody>


                @foreach ($bulletins as $bulletin)
                    <tr>
                        <td> {{ $bulletin->eleve->nom }} <br> {{ $bulletin->eleve->prenom }} </td>

                        @php
                            $note_total = 0;
                        @endphp
                        @foreach ($bulletin->notes as $note)
                            @if ($note->note == 0.1)
                                <td></td>
                            @else
                                <td>{{ $note->note * $note->cours->coeficient }}</td>
                                @php
                                    $note_total += $note->note * $note->cours->coeficient;
                                @endphp
                            @endif
                        @endforeach

                        <td>{{ $note_total }}</td>
                        <td>{{ $bulletin->moyenne }}</td>
                        <td>{{ $bulletin->rang }}</td>
                        <td>{{ $bulletin->mention }}</td>
                        <td> </td>
                    </tr>
                @endforeach


            </tbody>
        </table>

    </div>
    <!-- ============================================================== -->
    </div>

    <style>
        .table-1 {
            margin-top: 5px;
            width: 95%;
            height: auto;
            text-align: center;
            vertical-align: bottom;
            margin-left: auto;
            margin-right: auto;
            font-size: 14px;
            border-collapse: collapse;
        }

        .table-1 th {
            border: 0.8px solid rgb(160, 156, 156);
        }

        .table-1 td {
            border: 0.8px solid rgb(160, 156, 156);
        }

        .content-blog {
            width: 100%;
            margin: 5px auto;
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .div-content {
            width: 100%;
            margin: 0 auto;
            box-sizing: border-box;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        .div-1 div {
            text-align: center;
        }

    </style>

</body>

</html>
