<h3>Gegevens nieuw lid:</h3>
<p>Voornaam: {{ $signupModel->NLvoornaam }}</p>
<p>Achternaam: {{ $signupModel->NLachternaam }}</p>
<p>E-mail: {{ $signupModel->NLemail }}</p>
<p>E-mail ouders voogd: {{ $signupModel->NLemailOudersVoogd }}</p>
<p>Postcode: {{ $signupModel->NLpostcode }}</p>
<p>Huisnummer: {{ $signupModel->NLhuisnummer }}</p>
<p>Geboortedatum: {{ $signupModel->NLgeboortedatum }}</p>
<p>Geslacht: {{ $signupModel->NLgeslacht }}</p>
<p>Telefoonnummer: {{ $signupModel->NLtelefoonnummer }}</p>

<h3>Gegevens rekeninghouder:</h3>
<p>Voorletter en achternaam rekeninghouder: {{ $signupModel->RHvoorletterachternaam }}</p>
<p>Iban rekeninghouder: {{ $signupModel->RHiban }}</p>
<p>Telefoonnummer rekeninghouder: {{ $signupModel->RHtelefoon }}</p>
<p>E-mailadres rekeninghouder: {{ $signupModel->RHemail }}</p>

<h3>Overige gegevens:</h3>
<p>Lid type: {{ $signupModel->RHtype }}</p>
<p>Foto: de pasfoto is bijgevoegd</p>


<p>Bestuur: {{ $signupModel->functies[0] }}</p>
<p>Activiteiten: {{ $signupModel->functies[1] }}</p>
<p>Trainer: {{ $signupModel->functies[2] }}</p>
<p>Coach: {{ $signupModel->functies[3] }}</p>
<p>Scheidsrechter: {{ $signupModel->functies[4] }}</p>
<p>Teammanager: {{ $signupModel->functies[5] }}</p>
<p>Jeugdlid onder 14: {{ $signupModel->functies[6] }}</p>
