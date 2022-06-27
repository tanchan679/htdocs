<style>
    .nav-header {
    }

    .nav-header li {
        padding-right: 30px;
    }

    .nav-header li a {
        color: #fff;
        font-size: 18px;
    }
</style>
<header class="topbar">
    <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto nav-header align-items-center hidden-md-down"
                style="margin: auto !important;">
                <li>
                    <a href="" class="waves-effect"><i class="fa fa-area-chart m-r-10"
                                                                                    aria-hidden="true"></i>Trang chủ</a>
                </li>
                <li>
                    <a href="<?= base_url('webmanager/notification') ?>" class="waves-effect"><i class="fa fa-tags m-r-10"
                                                                                            aria-hidden="true"></i>Thông báo</a>
                </li>
                <li>
                    <a href="<?= base_url('webmanager/post') ?>" class="waves-effect"><i class="fa fa-share m-r-10"
                                                                                            aria-hidden="true"></i>Bài chia sẻ</a>
                </li>
                <li>
                    <a href="<?= base_url('webmanager/feedback') ?>" class="waves-effect"><i class="fa fa-commenting m-r-10"
                                                                                            aria-hidden="true"></i>Phản hồi</a>
                </li>
                <li>
                    <a href="<?= base_url('webmanager/category') ?>" class="waves-effect"><i class="fa fa-folder-open m-r-10"
                                                                                            aria-hidden="true"></i>Danh mục</a>
                </li>
            </ul>
            <!-- ============================================================== -->
            <!-- User profile -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" id="btn-logout">
                        <img src="<?= base_url("vender/img/avatar.jpg"); ?>" alt="user"
                             class="profile-pic m-r-5"/>
                        <?php if (!empty($_SESSION['name'])): ?>
                            <?php echo $_SESSION['name'] ?>
                        <?php endif ?>
                    </a>
                </li>
            </ul>
        </div>

    </nav>
</header>

<script>
    const base_url = "<?php echo base_url(); ?>";

    $("#btn-logout").on("click", function (e) {
        var r = confirm("Bạn có muốn đăng xuất không ?");
        if (r == true) {
            window.location.href = base_url + "webmanager/auth/logout";
        }
    })
</script>