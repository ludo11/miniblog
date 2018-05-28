<h1 class="display-4" id="connecter">Inscrivez-vous ici</h1>
<section id="formConnect">
<form id="connexion"   action="?controller=users&action=verif" method="POST">
    <p><label>Identifiant  </label>
        <input name="user" type="text" placeholder="Identifiant" id="user"/></p>
    
    <p><label>Mot de passe</label>
        <input type="password" name="mdp" placeholder="mdp" id="mdp"/></p>
    
      <p><label>Confirmez mdp</label>
        <input type="password" name="confirm_mdp" placeholder="mdp" id="confirm_mdp"/></p>
      
      <p><label>Mail</label>
          <input type="email" name="mail" placeholder="mail" id="mail"/></p>
      
    <button type="submit" class="btn btn-primary mb-2">Valider</button>
    
 
</form>
</section>


<!--<p>Création nouvelle utilisateur</p>

<form method="POST" action="?controller=users&action=verif">
    <p><label>Pseudo</label>
        <input type="text" name="user" id="author" placeholder="Pseudo"/></p>
    <p><label>Mot de passe</label>
        <input type="text" name="mdp" placeholder="Mot de passe"/></p>
   

<input type="submit" id="submit"/>

</form>-->