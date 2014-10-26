    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-3">
          <h2>Registration process</h2>
          <p>Διαδικασία εγγραφής φοιτητή σε κάποια δραστηριότητα. Στα βήματα που ακολουθούν περιλαμβάνεται η επιλογή της δραστηριότητας, η αναζήτηση του φοιτητή, και τέλος η εγγραφή του.</p>
          <p><a class="btn btn-primary btn-lg btn-block" href="<?php echo base_url() ?>registration">Take me there &raquo;</a></p>
        </div>
        <div class="col-lg-3">
          <h2>Events</h2>
          <p>Λίστα δραστηριοτήτων. Περιλαμβάνει την δημιουργία, επεξεργασία, διαγραφή και παρουσίαση εγγραφών των διάφορων δραστηριοτήτων.</p>
          <p><a class="btn btn-primary btn-lg btn-block" href="<?php echo base_url() ?>event">Take me there &raquo;</a></p>
       </div>
        <div class="col-lg-3">
          <h2>Students</h2>
          <p>Λίστα φοιτητών. Περιλαμβάνει την δημιουργία, επεξεργασία, διαγραφή και προβολή πληροφοριών για τον κάθε φοιτητή erasmus καθώς και για τα μέλη των συλλόγων.</p>
          <p><a class="btn btn-primary btn-lg btn-block" href="<?php echo base_url() ?>student">Take me there &raquo;</a></p>
        </div>
        <div class="col-lg-3">
          <h2>Share it!</h2>
          <p>Εφαρμογή για την μαζική κοινοποίηση ειδήσεων. Με ένα μόνο κλικ, κοινοποιεί το μήνυμα στα groups του Facebook και Twitter.</p>
          <p><a class="btn btn-primary btn-lg btn-block" href="<?php echo base_url() ?>shareIt">Take me there &raquo;</a></p>
        </div>
      </div>
      
      <hr>

      <div class="row">
        <div id="bic_calendar"></div>
      </div>
    </div> <!-- /container -->

    <script type="text/javascript">
    $(document).ready( function(){
      <?php
        $js_array = json_encode($events);
        echo "var events = ". $js_array . ";\n";
      ?>

    $('#bic_calendar').bic_calendar({
        events: events
    });
    } );  
    $("[data-toggle=popover]").popover();
    </script>
