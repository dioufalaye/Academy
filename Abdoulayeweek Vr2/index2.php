<script>
    function myFunction() 
    {
        document.getElementById("contact-form").reset();
    }
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
<link rel="stylesheet" href="index2.css">
<title>CONTACTEZ-MOI</title>
    <title>CONTACTEZ-MOI</title>
</head>
<body >
    <div class="container">
        <div class="divider"></div>
        <div class="heading">
        <h2>FORMULAIRE D'INSCRIPTION</h2>
        </div>
        <div class="row">
            <div class="col-lg-10-col-lg-offset-1">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="contact-form" method="post" role="form" name="contact-form">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="firstname">Prenom<span class="blue"> *<span></span></label>
                            <input type="text" name="firstname"  class="form-control" id="firstname" placeholder="votre prenom" value="<?php ?>">
                            <p class="comments"></p>
                        </div>

                        

                   
                        <div class="col-md-6">
                            <label for="name">Nom<span class="blue"> *<span></span></label>
                           <input type="text" name="name" class="form-control" id="name" placeholder="votre nom" 
                           value="<?php ?>">
                            <p class="comments"></p>
                        </div>
                            
                        <div class="col-md-6">
                            <label for="email">ADRESSE<span class="blue"> *<span></span></label>
                           <input type="text"  name="email" class="form-control" id="email" placeholder="votre " value="<?php ?>">
                            <p class="comments"></p>
                        </div>

                        <div class="col-md-6">
                            <label for="telephone">telephone</label>
                           <input type="tel" name="telephone" class="form-control" id="telephone" placeholder="votre telephone" value="<?php ?>">
                            <p class="comments"></p>
                        </div>

                        <div class="col-md-6">
                            <label for="telephone">confirmation de numero </label>
                           <input type="tel" name="telephone2" class="form-control" id="telephone" placeholder="veuillez confirmer votre numero" value="<?php ?>">
                            <p class="comments"></p>
                        </div>

                        <div id="text1">   <p>Choisir votre Genre:</p></div>
            <select name="genre" id="gender">
                <option id="man" value="homme" selected="selected">Homme</option>
                <option id="woman" value="femme">Femme</option>
            </select>
            <!--c -->
            <div id="text2">     <p>Etes vous satisfait:</p></div>
            <input type="radio" id="Oui" name="satisfait" value="Oui" checked="checked">
            <label for="Oui">Oui</label>
            <input type="radio" id="Non" name="satisfait" value="Non">
            <label for="Nom">Non</label>
            <!--d -->
            <div id="text3"><p>Choisissez vos langues</p> </div>
            <input type="checkbox" id="langue1" name="langue1" value="Francais" checked="checked">
            <label for="langue1"> Francais</label>
            <input type="checkbox" id="langue2" name="langue2" value="Anglais">
            <label for="langue2">Anglais</label><br>
            <input type="checkbox" id="langue3" name="langue3" value="Espagnole">
            <label for="langue3">Espagnole</label>
            <input type="checkbox" id="langue4" name="langue4" value="Portuguais">
            <label for="langue4">Portugais</label><br>

                        <div class="col-md-12">
                            <label for="message">message<span class="blue"> *<span></span></label>
                            <textarea name="message" id="message" cols="30" rows="4" class="message" placeholder="votre message" ><?php ?></textarea>
                            <p class="comments"></p>
                        </div>

                        <div class="col-md-12">
                            <p class="blue"><strong>*Ces informations sont requises</strong></p>
                        </div>

                        <div class="col-md-12">
                            <input type="submit" class="button1" name="Envoyer" value="Envoyer">
                        </div>
                        <div class="col-md-12">
                            <input type="buttom" onclick="myFunction()" class="button1" name="Reinitialiser" value="Reinitialiser">
                           
                        </div>

                        </div>

                   
                       
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    <?php 
    //DEBUT PHP
   
        include('fonction.php');
        $k=0;
        $languages="";

        if(isset($_POST['langue1']) )
        
        
        {
            $k=$k+1;
            $_SESSION['L1']=($_POST['langue1']);
            $language="F, ";
            $languages.=$language;

        }
        if(isset($_POST['langue2']))
        {
            $_SESSION['L2']=($_POST['langue2']);
            $k=$k+1;
            $language="A, ";
            $languages.=$language;
        }
        if(isset($_POST['langue3']))
        {
            $_SESSION['L3']=($_POST['langue3']);
            $k=$k+1;
            $language="E, ";
            $languages.=$language;
        }
        if(isset($_POST['langue4']))
        {
            $_SESSION['L4']=($_POST['langue4']);
            $k=$k+1;
            $language="E,";
            $languages.=$language;
        }
        
        if(isset($_POST['Envoyer']) && $k>=2 &&  Maj($_POST['firstname']) && Maj($_POST['name']) &&  adresseValide($_POST['email']) && verifNumeroIdentique($_POST['telephone'], $_POST['telephone2']) && validecommentairebi($_POST['message']))
        {
           
           

             $_SESSION['PrenomV']=$_POST['firstname'];
             $_SESSION['NomV']=Maj($_POST['name']);
             $_SESSION['GenreV']=$_POST['genre'];
             $_SESSION['AdresseV']=adresseValide($_POST['email']);
             $_SESSION['telephoneV']=numeroValide($_POST['telephone']);
             $_SESSION['Satifaction']=$_POST['satisfait'];
             $_SESSION['Meslangues']=$languages;

             $_SESSION['Liste']=[ [$_SESSION['PrenomV'],$_SESSION['NomV'],$_SESSION['AdresseV'],$_SESSION['GenreV'],$_SESSION['telephoneV'],$_SESSION['Satifaction'], $_SESSION['Meslangues']]];
             
             ?> 
             <table>
                 <tr>
                      <th>Prenon</th>
                      <th>Nom</th>
                      <th>Adresse</th>
                      <th>Genre</th>
                      <th>numero</th>
                      <th>Satisfait</th>
                      <th>Langues</th>
                </tr><br>
               
                  <?php foreach($_SESSION['Liste'][0] as $key=>$value )
                  { echo ' <tr>';
                      for ($i=0; $i <7 ; $i++) 
                      {
                          ?>
                        <td> <?php echo  $_SESSION['Liste'][0][$i]; ?> <br</td>

                          <?php   
                                
                      }  
                      echo' </tr> ';
                           
                  }
                  ?>
                  <br>
                

             </table>
             <?php
             

        }
        elseif($k<2 )
        {
            echo "le nombre de choix minimale est 2";
        }
        elseif(!Maj($_POST['firstname']) )
        {
            echo "le prenom doit etre Alphabetique";
            $_POST['firstname']="";
        }
        elseif(!Maj($_POST['name']))
        {
            echo "le nom doit etre Alphabetique";
            $_POST['name']="";
        }
        elseif(!adresseValide($_POST['email']))
        {
            echo "l'adresse doit etre alphanumerique";
            $_POST['adresse']="";
        }
         elseif(!verifNumeroIdentique($_POST['telephone'], $_POST['telephone2']))
        {
            echo "votre numero n'est pas valides ou pas identiques a celle confirmé ";
            $_POST['telephone']="";
            $_POST['telephone2']="";

        }
      
        elseif(!validecommentairebi($_POST['message']))
        {
           echo " votre commentaire est invalide";
        }
        
        
      if(isset($_POST['Reinitialiser']))
        {
            $_POST['adresse']="";
            $_POST['telephone']="";
            $_POST['telephone2']="";
            $_POST['firstname']="";
            $_POST['name']="";

        }

    ?>
</body>
</html>