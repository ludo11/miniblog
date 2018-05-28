


   

  
    <input type="text" name="user" id="profilUser" value="<?php echo $_SESSION['user']; ?>" disabled="disabled"/><br>
<form method="POST" action="?controller=users&action=profil&id=<?php echo $_SESSION['id']; ?>"> 
    <input type="hidden" name="role" value="<?php echo $users->role; ?>"/>
    <input type="email" name="mail" id="profilMail" value="<?php echo $users->mail ?>" />
    <button type="submit" class="btn btn-primary mb-2">Mise a jour mail</button>
</form>


 <div id="infoProfil"><p><?php echo 'Vos commentaires  sur le forum : <strong>'.$profilComment['COUNT(*)'].'</strong> commentaires'; ?></p>
     <p><?php echo 'Vos Posts  sur le forum : <strong>'.$profilPost['COUNT(*)'].'</strong> post(s)'; ?></p>
      <p><?php echo 'Votres dernier message  sur le forum : <br><strong>Titre :'.$dernierPost['title'].'<br>contenu : '.$dernierPost['content'].' '.$dernierPost['created_date'].'</strong> '; ?></p>
  </div>
 <form method="POST" action="?controller=users&action=updateProfilMdp&id=<?php echo $_SESSION['id']; ?>"> 
     <input type="hidden" name="user" value="<?php echo $users->user;  ?>"/>
     <label>Ancien mdp :</label>
     <input type="password" name="ancien_mdp" id="profilMail" placeholder="Ancien mdp" /><br>
     <label>Nouveau mdp :</label>
     <input type="password" name="mdp" id="profilMail" placeholder="Nouveau mdp"/>
     <input type="password" name="confirm_mdp" id="profilMail" placeholder="Confirmer nouveau mdp"/>
    <button type="submit" class="btn btn-primary mb-2">Mise a jour MDP</button>
</form>