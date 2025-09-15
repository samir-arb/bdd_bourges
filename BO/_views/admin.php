<?php

include($_SERVER['DOCUMENT_ROOT'] . '/host.php');

if (isset($_SESSION['auth']) && $_SESSION['auth']->role_level > 99) {


    include($_SERVER['DOCUMENT_ROOT'] . '/BO/_blocks/sidebar.php');

    include($_SERVER['DOCUMENT_ROOT'] . '/BO/_blocks/header.php');

    $domaine = "Dashboard";
    $sousDomaine = "Admin / Liste des utilisateurs";

    include($_SERVER['DOCUMENT_ROOT'] . '/BO/_blocks/ariane.php');

    if (isset($_GET['action']) && $_GET['action'] == "addUser") {

        $selectCivilites = $db->prepare('SELECT * FROM civilites');
        $selectCivilites->execute();

        $selectRoles = $db->prepare('SELECT * FROM roles');
        $selectRoles->execute();

        if (isset($_POST['addUser'])) {

            $errors = array(); //ou $errors = [];

            if (empty($_POST['id_civilite'])) {
                $errors['civilité'] = "vous devez sélectionner une civilité.";
            }

            if (empty($_POST['user_name']) || !preg_match('/^[a-zA-z -]+$/', $_POST['user_name'])) {
                $errors['user_name'] = 'Le champs "Nom" n\'est pas valide.';
            }

            if (empty($_POST['user_firstname']) || !preg_match('/^[a-zA-z -]+$/', $_POST['user_firstname'])) {
                $errors['user_firstname'] = 'Le champs "Prénom" n\'est pas valide.';
            }

            if (empty($_POST['user_mail']) || !filter_var($_POST['user_mail'], FILTER_VALIDATE_EMAIL)) {
                $errors['user_mail'] = "votre mail n'est pas valide";
            } else {
                $req = $db->prepare('SELECT * FROM users WHERE user_mail = ?');
                $req->execute([$_POST['user_mail']]);
                $email = $req->fetch();
                if ($email) {
                    $errors['user_mail'] = "L'email est deja present dans la base de données.";
                }
            }

            if (empty($_POST['id_role'])) {
                $errors['role'] = "vous devez sélectionner une role.";
            }

            if (empty($_POST['user_pwd']) || $_POST['user_pwd'] != $_POST['conf_pwd']) {
                $errors['user_pwd'] = "Les mots de passes ne sont identiques.";
            }

            if (empty($errors)) {
                $id_civilite = $_POST['id_civilite'];
                $name = $_POST['user_name'];
                $firstname = $_POST['user_firstname'];
                $mail = $_POST['user_mail'];
                $id_role = $_POST['id_role'];
                $pwd = $_POST['user_pwd'];
                $insert_user = $db->prepare('INSERT INTO users SET
                    id_civilite = ?,
                    user_name = ?,
                    user_firstname = ?,
                    user_mail = ?,
                    id_role = ?,
                    user_pwd = ?           
                ');
                $password = password_hash($pwd, PASSWORD_ARGON2I);
                $insert_user->execute([$id_civilite, $name, $firstname, $mail, $id_role, $password]);
            }
        }
?>

        <div class="flexRow justifyCenter">
            <?php
            if (!empty($errors)) {
                foreach ($errors as $error) {
            ?>
                    <li><?php echo $error; ?></li>
            <?php
                }
            }

            ?>

            <div class="container">
                <div class="form-box register">
                    <form method="POST">
                        <h1>Ajouter un utilisateur</h1>
                        <div class="input-box">
                            <select name="id_civilite">
                                <?php while ($sC = $selectCivilites->fetch(PDO::FETCH_OBJ)) {
                                ?>
                                    <option value="<?php echo $sC->id_civilite; ?>"><?php echo $sC->civilite_titre; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-box">
                            <input type="text" placeholder="Nom" name="user_name" required />
                            <i class="bx bxs-user"></i>
                        </div>
                        <div class="input-box">
                            <input type="text" placeholder="Prénom" name="user_firstname" required />
                            <i class="bx bxs-user"></i>
                        </div>
                        <div class="input-box">
                            <input type="email" placeholder="Email" name="user_mail" require />
                            <i class="bx bxs-envelope"></i>
                        </div>
                        <div class="input-box">
                            <select name="id_role">
                                <?php while ($sR = $selectRoles->fetch(PDO::FETCH_OBJ)) {
                                ?>
                                    <option value="<?php echo $sR->id_role; ?>"><?php echo $sR->role_name; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-box">
                            <input
                                type="password"
                                placeholder="Mot de passe" name="user_pwd" id="pswrd" onkeyup="checkPassword(this.value)"
                                required />
                            <i class="bx bxs-lock-alt"></i>
                        </div>
                        <div class="input-box">
                            <input
                                type="password"
                                placeholder="Confirmer" name="conf_pwd"
                                required />
                            <i class="bx bxs-lock-alt"></i>
                        </div>
                        <div class="validation">
                            <ul>
                                <li id="lower">Au moins une minuscule.</li>
                                <li id="upper">Au moins une majuscule.</li>
                                <li id="number">Au moins un chiffre.</li>
                                <li id="special">Au moins un caractere speciale.</li>
                                <li id="length">Au moins huit caractères.</li>
                            </ul>
                        </div>

                        <input type="submit" class="btn" name="addUser" value="Enregistrer">7

                        <p>or register with social platforms</p>
                        <div class="social-icons">
                            <a href="#"><i class="bx bxl-google"></i></a>
                            <a href="#"><i class="bx bxl-facebook"></i></a>
                            <a href="#"><i class="bx bxl-github"></i></a>
                            <a href="#"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    <?php

    } else {


    ?>
        <div class="records table_responsive">
            <div class="record_header spaceBetween alignCenter">
                <div class="add alignCenter">
                    <span>Entries</span>
                    <select name="#" id="#">
                        <option value="#">ID</option>
                    </select>
                    <a href="admin.php?zone=admin&action=addUser">Ajouter un utilisateur</a>
                </div>
                <div class="browse alignCenter">
                    <input type="search" placeholder="Search" class="record_search">
                    <select name="#" id="#">
                        <option value="#">Status</option>
                    </select>
                </div>
            </div>
            <div>
                <table width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><span class="las la-sort uppercase"></span> client</th>
                            <th><span class="las la-sort uppercase"></span> total</th>
                            <th><span class="las la-sort uppercase"></span> issued date</th>
                            <th><span class="las la-sort uppercase"></span> balance</th>
                            <th><span class="las la-sort uppercase"></span> actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#5033</td>
                            <td>
                                <div class="client alignCenter">
                                    <div class="profile_img_he bg_img"></div>
                                    <div class="client-info">
                                        <h4 class="capitalize">eddy torial</h4>
                                        <small>editorial@crossover.org</small>
                                    </div>
                                </div>
                            </td>
                            <td>$3171</td>
                            <td>19 April, 2022</td>
                            <td>$205</td>
                            <td>
                                <div class="actions">
                                    <span class="las la-telegram-plane"></span>
                                    <span class="las la-eye"></span>
                                    <span class="las la-ellipsis-v"></span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#5033</td>
                            <td>
                                <div class="client alignCenter">
                                    <div class="profile_img_she bg_img"></div>
                                    <div class="client-info">
                                        <h4 class="capitalize">Claire Voyant</h4>
                                        <small>clairvoyant@crossover.org</small>
                                    </div>
                                </div>
                            </td>
                            <td>$3171</td>
                            <td>19 April, 2022</td>
                            <td>$205</td>
                            <td>
                                <div class="actions">
                                    <span class="las la-telegram-plane"></span>
                                    <span class="las la-eye"></span>
                                    <span class="las la-ellipsis-v"></span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#5033</td>
                            <td>
                                <div class="client alignCenter">
                                    <div class="profile_img_he bg_img"></div>
                                    <div class="client-info">
                                        <h4 class="capitalize">Paul Ochon</h4>
                                        <small>polochon@crossover.org</small>
                                    </div>
                                </div>
                            </td>
                            <td>$3171</td>
                            <td>19 April, 2022</td>
                            <td><span class="paid textCenter">Paid</span></td>
                            <td>
                                <div class="actions">
                                    <span class="las la-telegram-plane"></span>
                                    <span class="las la-eye"></span>
                                    <span class="las la-ellipsis-v"></span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#5033</td>
                            <td>
                                <div class="client alignCenter">
                                    <div class="profile_img_she bg_img"></div>
                                    <div class="client-info">
                                        <h4 class="capitalize">anna tomie</h4>
                                        <small>anatomie@crossover.org</small>
                                    </div>
                                </div>
                            </td>
                            <td>$3171</td>
                            <td>19 April, 2022</td>
                            <td>$205</td>
                            <td>
                                <div class="actions">
                                    <span class="las la-telegram-plane"></span>
                                    <span class="las la-eye"></span>
                                    <span class="las la-ellipsis-v"></span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#5033</td>
                            <td>
                                <div class="client alignCenter">
                                    <div class="profile_img_he bg_img"></div>
                                    <div class="client-info">
                                        <h4 class="capitalize">alex térieur</h4>
                                        <small>alexterieur@crossover.org</small>
                                    </div>
                                </div>
                            </td>
                            <td>$3171</td>
                            <td>19 April, 2022</td>
                            <td><span class="paid textCenter">Paid</span></td>
                            <td>
                                <div class="actions">
                                    <span class="las la-telegram-plane"></span>
                                    <span class="las la-eye"></span>
                                    <span class="las la-ellipsis-v"></span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#5033</td>
                            <td>
                                <div class="client alignCenter">
                                    <div class="profile_img_she bg_img"></div>
                                    <div class="client-info">
                                        <h4 class="capitalize">aude javel</h4>
                                        <small>eaudejavel@crossover.org</small>
                                    </div>
                                </div>
                            </td>
                            <td>$3171</td>
                            <td>19 April, 2022</td>
                            <td><span class="paid textCenter">Paid</span></td>
                            <td>
                                <div class="actions">
                                    <span class="las la-telegram-plane"></span>
                                    <span class="las la-eye"></span>
                                    <span class="las la-ellipsis-v"></span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#5033</td>
                            <td>
                                <div class="client alignCenter">
                                    <div class="profile_img_he bg_img"></div>
                                    <div class="client-info">
                                        <h4 class="capitalize">marc assin</h4>
                                        <small>marcassin@crossover.org</small>
                                    </div>
                                </div>
                            </td>
                            <td>$3171</td>
                            <td>19 April, 2022</td>
                            <td>$205</td>
                            <td>
                                <div class="actions">
                                    <span class="las la-telegram-plane"></span>
                                    <span class="las la-eye"></span>
                                    <span class="las la-ellipsis-v"></span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#5033</td>
                            <td>
                                <div class="client alignCenter">
                                    <div class="profile_img_she bg_img"></div>
                                    <div class="client-info">
                                        <h4 class="capitalize">emma patience</h4>
                                        <small>etmapatience@crossover.org</small>
                                    </div>
                                </div>
                            </td>
                            <td>$3171</td>
                            <td>19 April, 2022</td>
                            <td>$205</td>
                            <td>
                                <div class="actions">
                                    <span class="las la-telegram-plane"></span>
                                    <span class="las la-eye"></span>
                                    <span class="las la-ellipsis-v"></span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#5033</td>
                            <td>
                                <div class="client alignCenter">
                                    <div class="profile_img_he bg_img"></div>
                                    <div class="client-info">
                                        <h4 class="capitalize">théo rème</h4>
                                        <small>theoreme@crossover.org</small>
                                    </div>
                                </div>
                            </td>
                            <td>$3171</td>
                            <td>19 April, 2022</td>
                            <td>$205</td>
                            <td>
                                <div class="actions">
                                    <span class="las la-telegram-plane"></span>
                                    <span class="las la-eye"></span>
                                    <span class="las la-ellipsis-v"></span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#5033</td>
                            <td>
                                <div class="client alignCenter">
                                    <div class="profile_img_she bg_img"></div>
                                    <div class="client-info">
                                        <h4 class="capitalize">marion nettes</h4>
                                        <small>marionnettes@crossover.org</small>
                                    </div>
                                </div>
                            </td>
                            <td>$3171</td>
                            <td>19 April, 2022</td>
                            <td>$205</td>
                            <td>
                                <div class="actions">
                                    <span class="las la-telegram-plane"></span>
                                    <span class="las la-eye"></span>
                                    <span class="las la-ellipsis-v"></span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#5033</td>
                            <td>
                                <div class="client alignCenter">
                                    <div class="profile_img_he bg_img"></div>
                                    <div class="client-info">
                                        <h4 class="capitalize">alain provist</h4>
                                        <small>alimproviste@crossover.org</small>
                                    </div>
                                </div>
                            </td>
                            <td>$3171</td>
                            <td>19 April, 2022</td>
                            <td><span class="paid textCenter">Paid</span></td>
                            <td>
                                <div class="actions">
                                    <span class="las la-telegram-plane"></span>
                                    <span class="las la-eye"></span>
                                    <span class="las la-ellipsis-v"></span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
<?php
    }




    include($_SERVER['DOCUMENT_ROOT'] . '/BO/_blocks/footer.php');
} else {
    echo "<script language='javascript'>
            document.location.replace('login.php')
            </script>";
}
?>