<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4"
        style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="../assets/img/bruce-mars.jpg" alt="profile_image"
                        class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        <?= $this->session->userdata('nama_user'); ?>
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        Admin
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <form action="<?= base_url('welcome/updateProfile/'.$this->session->userdata('id_user')); ?>" method="post">
                <div class="row">
                    <form action="updateProfile">
                        <div class="col-12 col-xl-4">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <h6 class="mb-0">Username</h6>
                                </div>
                                <div class="card-body p-3">
                                    <input type="text" class="form-control"
                                        placeholder='<?= $this->session->userdata('username'); ?>' name="username">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <div class="row">
                                        <div class="col-md-8 d-flex align-items-center">
                                            <h6 class="mb-0">Password</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <input type="password" class="form-control"
                                        placeholder='<?= $this->session->userdata('password'); ?>' name="password">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <h6 class="mb-0">Nama Lengkap</h6>
                                </div>
                                <div class="card-body p-3">
                                    <input type="text" class="form-control"
                                        placeholder="<?= $this->session->userdata('nama_user'); ?>" name="nama_user">
                                    <button type="submit" class="btn btn-success mt-2">Update Profile</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </form>
        </div>
    </div>
</div>