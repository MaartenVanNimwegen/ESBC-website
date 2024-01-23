    @extends('layouts.app')
    @section('content')
        <div id="lid-worden">
            <div class="nav-background"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h1 class="text-uppercase fw-bold">Inschrijfformulier</h1>
                        <form action="{{ route('signup') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <p class="fw-bold">Inschrijfformulier en machtiging ESBC Menhir uit Sneek</p>
                            <p class="fw-bold">Persoonsgegevens nieuw lid:</p>

                            <label class="form-label" for="voornaam">Voornaam:</label>
                            <input class="form-control" type="text" name="NLvoornaam" id="voornaam">

                            <label class="form-label" for="achternaam">Achternaam:</label>
                            <input class="form-control" type="text" name="NLachternaam" id="achternaam">

                            <label class="form-label" for="email">E-mail adres:</label>
                            <input class="form-control" type="text" name="NLemail" id="email">

                            <label class="form-label" for="email-ouders">E-mail adres ouders/voogd:</label>
                            <input class="form-control" type="text" name="NLemailOudersVoogd" id="email-ouders">

                            <label class="form-label" for="postcode">Postcode:</label>
                            <input class="form-control" type="text" name="NLpostcode" id="postcode">

                            <label class="form-label" for="huisnummer">Huisnummer:</label>
                            <input class="form-control" type="text" name="NLhuisnummer" id="huisnummer">

                            <label class="form-label" for="geboortedatum">Geboortedatum:</label>
                            <input class="form-control" type="text" name="NLgeboortedatum" id="geboortedatum">

                            <label class="form-label" for="geslacht">Geslacht:</label>
                            <select class="form-select" name="NLgeslacht" id="geslacht">
                                <option value="0">Man</option>
                                <option value="1">Vrouw</option>
                            </select>

                            <label class="form-label" for="telefoonnummer">Telefoonnummer:</label>
                            <input class="form-control" type="tel" name="NLtelefoonnummer" id="telefoonnummer">

                            <br>
                            <p class="fw-bold">Persoonsgegevens rekeninghouder:</p>

                            <label class="form-label" for="voorlettersenachternaam">Voorletters en achternaam:</label>
                            <input class="form-control" type="text" name="RHvoorletterachternaam"
                                id="voorlettersenachternaam">

                            <label class="form-label" for="iban">IBAN:</label>
                            <input class="form-control" type="text" name="RHiban" id="iban">

                            <label class="form-label" for="telefoonnummerrekeninghouder">Telefoonnummer
                                rekeninghouder:</label>
                            <input class="form-control" type="tel" name="RHtelefoon" id="telefoonnummerrekeninghouder">

                            <label class="form-label" for="emailrekeninghouder">E-mailadres rekeninghouder:</label>
                            <input class="form-control" type="text" name="RHemail" id="emailrekeninghouder">

                            <label class="form-label" for="lidmaatschap">Type lidmaatschap:</label>
                            <select class="form-select" name="type" id="lidmaatschap">
                                <option value="0">Competitie</option>
                                <option value="1">Recreant</option>
                            </select>

                            <label class="form-label" for="pasfoto">Pasfoto:</label>
                            <input type="file" id="pasfoto" name="pasfoto" class="form-control" accept="image/*">

                            <br>
                            <p class="fw-bold">Functies binnen ESBC Menhir</p>
                            <p>Binnen de vereniging ESBC Menhir ben je vanaf de U14 als wedstrijd spelend lid automatisch
                                timer/scorer. Daarnaast is ieder lid verplicht een functie te bekleden en/of deel te nemen
                                aan activiteiten. Vink minimaal één van onderstaande functies aan.</p>

                            <label for="functie">Functie's</label><br>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="functie">Bestuur</label>
                                <input name="bestuur" class="form-check-input" type="checkbox" id="functie">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="functie">Activiteiten</label>
                                <input name="activiteiten" class="form-check-input" type="checkbox" id="functie">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="functie">Trainer</label>
                                <input name="trainer" class="form-check-input" type="checkbox" id="functie">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="functie">Coach</label>
                                <input name="coach" class="form-check-input" type="checkbox" id="functie">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="functie">Scheidsrechter</label>
                                <input name="scheidsrechter" class="form-check-input" type="checkbox" id="functie">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="functie">Teammanager</label>
                                <input name="teammanager" class="form-check-input" type="checkbox" id="functie">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="functie">Jeugdlid onder 14</label>
                                <input name="jeugdlidonder14" class="form-check-input" type="checkbox" id="functie">
                            </div>

                            <p class="mt-4 fw-bold">Algemeen</p>
                            <p>Ik ben op de hoogte van de voorwaarden die aan mijn lidmaatschap gesteld worden zoals
                                omschreven in het Huishoudelijk Reglement, zie hiervoor het Huishoudelijk Reglement.</p>
                            <p>Door het versturen van dit formulier machtig je/machtigt u basketbal vereniging ESBC Menhir
                                tot het incasseren van de contributie via automatische incasso van het aangegeven IBAN
                                rekeningnummer in vier termijnen.Voor vragen kan je / kunt u terecht bij de penningmeester,
                                gegevens van de penningmeester staan op de website.</p>
                            <p>Indien je van een andere vereniging komt, altijd een schuldvrijverklaring van de vorige
                                vereniging aanleveren!</p>
                            <button class="btn btn-red" type="submit">Verzenden</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endsection
