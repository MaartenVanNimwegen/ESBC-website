<!doctype html>
<html lang="nl">

<body>
    @extends('layouts.app')
    @section('content')
        <div id="lid-worden">
            <div class="nav-background"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-uppercase fw-bold">Inschrijfformulier</h1>
                        <form action="" method="post">
                            @csrf
                            <p class="fw-bold">Inschrijfformulier en machtiging ESBC Menhir uit Sneek</p>
                            <p class="fw-bold">Persoonsgegevens nieuw lid:</p>

                            <label class="form-label" for="voornaam">Voornaam:</label>
                            <input class="form-control" type="text" name="voornaam" id="voornaam">

                            <label class="form-label" for="achternaam">Achternaam:</label>
                            <input class="form-control" type="text" name="achternaam" id="achternaam">

                            <label class="form-label" for="email">E-mail adres:</label>
                            <input class="form-control" type="text" name="email" id="email">

                            <label class="form-label" for="email-ouders">E-mail adres ouders/voogd:</label>
                            <input class="form-control" type="text" name="email-ouders" id="email-ouders">

                            <label class="form-label" for="postcode">Postcode:</label>
                            <input class="form-control" type="text" name="postcode" id="postcode">

                            <label class="form-label" for="huisnummer">Huisnummer:</label>
                            <input class="form-control" type="text" name="huisnummer" id="huisnummer">

                            <label class="form-label" for="geboortedatum">Geboortedatum:</label>
                            <input class="form-control" type="text" name="geboortedatum" id="geboortedatum">

                            <label class="form-label" for="geslacht">Geslacht:</label>
                            <select class="form-select" name="geslacht" id="geslacht">
                                <option value="man">Man</option>
                                <option value="vrouw">Vrouw</option>
                            </select>

                            <label class="form-label" for="telefoonnummer">Telefoonnummer:</label>
                            <input class="form-control" type="text" name="telefoonnummer" id="telefoonnummer">

                            <br>
                            <p class="fw-bold">Persoonsgegevens rekeninghouder:</p>

                            <label class="form-label" for="voorlettersenachternaam">Voorletters en achternaam:</label>
                            <input class="form-control" type="text" name="voorlettersenachternaam"
                                id="voorlettersenachternaam">

                            <label class="form-label" for="iban">IBAN:</label>
                            <input class="form-control" type="text" name="iban" id="iban">

                            <label class="form-label" for="telefoonnummerrekeninghouder">Telefoonnummer
                                rekeninghouder:</label>
                            <input class="form-control" type="text" name="telefoonnummerrekeninghouder"
                                id="telefoonnummerrekeninghouder">

                            <label class="form-label" for="emailrekeninghouder">E-mail adres rekeninghouder:</label>
                            <input class="form-control" type="text" name="emailrekeninghouder" id="emailrekeninghouder">

                            <label class="form-label" for="lidmaatschap">Type lidmaatschap:</label>
                            <select class="form-select" name="lidmaatschap" id="lidmaatschap">
                                <option value="competitie">Competitie</option>
                                <option value="recreant">Recreant</option>
                            </select>

                            <label class="form-label" for="pasfoto">Pasfoto:</label>
                            <input class="form-control" type="file" name="pasfoto" id="pasfoto">

                            <br>
                            <p class="fw-bold">Persoonsgegevens rekeninghouder:</p>
                            <p>Binnen de vereniging ESBC Menhir ben je vanaf de U14 als wedstrijd spelend lid automatisch
                                timer/scorer. Daarnaast is ieder lid verplicht een functie te bekleden en/of deel te nemen
                                aan activiteiten. Vink minimaal één van onderstaande functies aan.</p>

                            <label for="functie">Functie's</label><br>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="functie">Bestuur</label>
                                <input class="form-check-input" type="checkbox" id="functie" value="bestuur">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="functie">Activiteiten</label>
                                <input class="form-check-input" type="checkbox" id="functie" value="activiteiten">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="functie">Trainer</label>
                                <input class="form-check-input" type="checkbox" id="functie" value="trainer">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="functie">Coach</label>
                                <input class="form-check-input" type="checkbox" id="functie" value="coach">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="functie">Scheidsrechter</label>
                                <input class="form-check-input" type="checkbox" id="functie" value="scheidsrechter">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="functie">Teammanager</label>
                                <input class="form-check-input" type="checkbox" id="functie" value="teammanager">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="functie">Jeugdlid onder 14</label>
                                <input class="form-check-input" type="checkbox" id="functie" value="jeugdlidonder14">
                            </div>

                            <br>
                            <p class="fw-bold">Algemeen</p>
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
</body>

</html>
