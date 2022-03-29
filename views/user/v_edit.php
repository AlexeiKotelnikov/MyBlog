<div class="row main-form">
    <?php if ($showForm && empty($validateErrors)) : ?>
        <form class="" method="post">

            <div class="form-group">
                <label for="name" class="cols-sm-2 control-label">Your Name</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name" value="<?= isset(URL_PARAMS['id']) ? $user['name'] : '' ?>" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="cols-sm-2 control-label">Your Email</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email" value="<?= isset(URL_PARAMS['id']) ? $user['email'] : '' ?>" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="cols-sm-2 control-label">Username</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter your Username" value="<?= isset(URL_PARAMS['id']) ? $user['login'] : '' ?>" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Password</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="confirm" id="confirm" placeholder="Confirm your Password" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button id="button" class="btn btn-primary btn-lg btn-block login-button">Make changes</button>
            </div>

            <div class="alert error-list">
                <?php foreach ($validateErrors as $error) : ?>
                    <p class="text-danger"><?= $error ?></p>
                <?php endforeach; ?>
            </div>

        </form>
        <ul style="padding: 0; list-style: none;">
            <li><a href="<?= BASE_URL ?>">Move to main page</a></li>
            <li><a href="<?= BASE_URL ?>cabinet/<?= $user['id_user'] ?>">Back to the Cabinet</a></li>
        </ul>

    <?php elseif ($showForm && !empty($validateErrors)) : ?>
        <form class="" method="post">

            <div class="form-group">
                <label for="name" class="cols-sm-2 control-label">Your Name</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name" value="<?= isset(URL_PARAMS['id']) ? $fields['name'] : '' ?>" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="cols-sm-2 control-label">Your Email</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email" value="<?= isset(URL_PARAMS['id']) ? $fields['email'] : '' ?>" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="cols-sm-2 control-label">Username</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter your Username" value="<?= isset(URL_PARAMS['id']) ? $fields['username'] : '' ?>" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Password</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="confirm" id="confirm" placeholder="Confirm your Password" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button id="button" class="btn btn-primary btn-lg btn-block login-button">Make changes</button>
            </div>

            <div class="alert error-list">
                <?php foreach ($validateErrors as $error) : ?>
                    <p class="text-danger"><?= $error ?></p>
                <?php endforeach; ?>
            </div>

        </form>
        <ul style="padding: 0; list-style: none;">
            <li><a href="<?= BASE_URL ?>">Move to main page</a></li>
            <li><a href="<?= BASE_URL ?>cabinet/<?= $user['id_user'] ?>">Back to the Cabinet</a></li>
        </ul>

    <?php else : ?>
        Your info was edited successfully!
        <ul style="padding: 0; list-style: none;">
            <li><a href="<?= BASE_URL ?>">Move to main page</a></li>
            <li><a href="<?= BASE_URL ?>cabinet/<?= $user['id_user'] ?>">Back to the Cabinet</a></li>
        </ul>

    <?php endif; ?>
</div>