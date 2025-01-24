<?php 
 

/* Template Name: Segnala disservizio completo
 *
 * segnala disservizio template file
 *
 * @package Design_Comuni_Italia
 */


get_header();
?>
<head>
	  <style>
        /* Aggiungi eventuali stili personalizzati qui */
        .mb-3 {
            margin-bottom: 1rem;
        }

        .mt-2 {
            margin-top: 0.5rem;
        }

        .text-center {
            text-align: center;
        }

        .form-check-label {
            padding-left: 1.25rem;
        }
    </style>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">-->

   
    <meta content="No matter what type of website you own or manage, you probably need a contact form which help your visitor to contact you for any related query." name="description" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Form mail</title>

<script type="text/javascript" language="javascript">
	  let contatoreDocumenti = 1;

function aggiungiDocumento() {
    contatoreDocumenti++;

    const container = document.getElementById('documento-container');

    // Crea un nuovo input file
    const nuovoInput = document.createElement('input');
    nuovoInput.type = 'file';
    nuovoInput.name = 'documento' + contatoreDocumenti;
    nuovoInput.classList.add('documento');

    // Crea un nuovo label per la descrizione del campo
    const nuovoLabel = document.createElement('label');
    nuovoLabel.innerHTML = '<b>Allega un documento</b>&nbsp;&nbsp;&nbsp;';
    nuovoLabel.classList.add('form-label'); // Aggiungi la stessa classe del label originale

    if (container) {
        // Inserisci il nuovo input file all'interno del contenitore
       // container.appendChild(nuovoLabel);
        container.appendChild(nuovoInput);
    }
}


function valida(){
if (!confirm('Confermi i dati inseriti?')) return false;

if (document.getElementById('nome').value=='') {
alert('Compilare correttamente il campo Nome e cognome!');
document.getElementById('nome').focus();
return false;
}

if (document.getElementById('mail').value=='') {
alert('Compilare correttamente il campo Mail!');
document.getElementById('cognome').focus();
return false;
}

if (document.getElementById('messaggio').value=='') {
alert('Compilare correttamente il campo Messaggio!');
document.getElementById('mail').focus();
return false;
}

return true;
}//valida
</script>

</head>
<body>

<section class="container mb-4">
    <!-- Section heading -->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Segnalazione disservizio</h2>
    <!-- Section description -->
    <p class="text-center w-responsive mx-auto mb-5">Un servizio aperto a tutti i cittadini per segnalare disservizi, guasti e criticit&aacute; rilevati sul territorio comunale.</p>

    <div class="row">
        <!-- Grid column -->
        <div class="col-md-8 mx-auto">
            <form action="https://comune.nerola.rm.it/wp-content/themes/design-comuni-wordpress-theme-figlio/page-templates/invio.php"
                  method="post" enctype="multipart/form-data" onsubmit="return valida();" class="needs-validation" novalidate>

                <input type="hidden" name="destinatario" value="">

                <div class="mb-3">
                    <label for="nome" class="form-label"><b>Nome e cognome *</b></label>
                    <input type="text" name="nome" id="nome" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="mail" class="form-label"><b>Mail *</b></label>
                    <input type="text" name="mail" id="mail" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="categoria" class="form-label"><b>Categoria</b></label>
                    <input type="text" name="categoria" id="categoria" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label"><b>Luogo</b></label>
                    <input type="text" name="luogo" id="luogo" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="oggetto" class="form-label"><b>Oggetto</b></label>
                    <input name="oggetto" type="text" id="oggetto" class="form-control" value="">
                </div>

                <div class="mb-3">
                    <label for="messaggio" class="form-label"><b>Messaggio *</b></label>
                    <textarea class="form-control" id="messaggio" rows="3" name="messaggio" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="allegato" class="form-label"><b>Allega un immagine</b></label>
                    <input type="file" name="allegato" id="allegato" class="form-control">
                </div>

                
<div class="mb-3">
    <label for="documento" class="form-label"><b>Allega un documento</b></label>
   
        <!-- La lista dei file allegati verrà visualizzata qui verticalmente -->
    </div>
    <input type="file" name="documento" id="documento" class="form-control" style="margin-top: 5px;">
				<div id="documento-container" style="display: flex; flex-direction: column;"></div>
    <button type="button" class="btn btn-primary mt-2" onclick="aggiungiDocumento()">Aggiungi Documento</button>
 

                <div class="form-check mb-3">
                    <input style="margin-top:20px;" class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                    <label style="margin-top:20px;" class="form-check-label" for="invalidCheck2">
                        Acconsento al trattamento dei dati personali secondo l'<a href="https://comune.nerola.rm.it/privacy-policy/">Informativa Privacy</a>
                    </label>
                </div>

                <div class="mb-3">
                    <div id="captcha" class="g-recaptcha" data-sitekey="6LcishcmAAAAAHslPhVZ4YWVQovYZPHbAtOSlrZS"></div>
                </div>

                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Invia dati">
                </div>

            </form>
        </div>
    </div>

</section>
	<script>
					 // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
				</script>
		<?php get_template_part("template-parts/common/valuta-servizio"); ?>
	<?php get_template_part("template-parts/common/assistenza-contatti"); ?>
	
<?php
get_footer();
