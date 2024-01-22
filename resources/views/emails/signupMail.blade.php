<h1>Er is een nieuwe inschrijving! - ESBC Menhir</h1>

<h1>Gegevens nieuw lid:</h1>
<p>Voornaam: {{ $signupModel->NLvoornaam }}</p>
<p>Achternaam: {{ $signupModel->NLachternaam }}</p>
<p>E-mail: {{ $signupModel->NLemail }}</p>
<p>E-mail ouders voogd: {{ $signupModel->NLemailOudersVoogd }}</p>
<p>Postcode: {{ $signupModel->NLpostcode }}</p>
<p>Huisnummer: {{ $signupModel->NLhuisnummer }}</p>
<p>Geboortedatum: {{ $signupModel->NLgeboortedatum }}</p>
<p>Geslacht: {{ $signupModel->NLgeslacht }}</p>
<p>Telefoonnummer: {{ $signupModel->NLtelefoonnummer }}</p>

<h1>Gegevens rekeninghouder:</h1>
<p>Voorletter en achternaam rekeninghouder: {{ $signupModel->RHvoorletterachternaam }}</p>
<p>Iban rekeninghouder: {{ $signupModel->RHiban }}</p>
<p>Telefoonnummer rekeninghouder: {{ $signupModel->RHtelefoon }}</p>
<p>E-mailadres rekeninghouder: {{ $signupModel->RHemail }}</p>

<h1>Overige gegevens:</h1>
<p>Type: {{ $signupModel->RHtype }}</p>
<p>Foto: {{ $signupModel->RHpasfoto }}</p>
<p>Bestuur: {{ $signupModel->bestuur }}</p>
<p>Activiteiten: {{ $signupModel->activiteiten }}</p>
<p>Trainer: {{ $signupModel->trainer }}</p>
<p>Coach: {{ $signupModel->coach }}</p>
<p>Scheidsrechter: {{ $signupModel->scheidsrechter }}</p>
<p>Teammanager: {{ $signupModel->teammanager }}</p>
<p>Jeugdlid onder 14: {{ $signupModel->jeugdlidonder14 }}</p>
