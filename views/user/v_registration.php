<div class="row main-form">
    <form  method="post">

        <div class="form-group">
            <label for="name" class="cols-sm-2 control-label">Your Name</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name" value="<?= $fields['name'] ?>" />
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="cols-sm-2 control-label">Your Email</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email" value="<?= $fields['email'] ?>" />
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="username" class="cols-sm-2 control-label">Username</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter your Username" value="<?= $fields['username'] ?>" />
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
            <button id="button" class="btn btn-primary btn-lg btn-block login-button">Register</button>
        </div>

        <div class="alert error-list">
            <?php foreach ($validateErrors as $error) : ?>
                <p class="text-danger"><?= $error ?></p>
            <?php endforeach; ?>
        </div>

    </form>
</div>