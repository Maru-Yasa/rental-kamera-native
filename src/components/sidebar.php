<div class="col-sm-auto bg-light sticky-top shadow">
                <div class="d-flex flex-sm-column flex-row flex-nowrap bg-light align-items-center sticky-top">
                    <a href="/" class="d-block p-3 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                        <i class="bi-joystick text-primary fs-1"></i>
                    </a>
                    <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center">
                        <li class="nav-item">
                            <a href="/admin" class="nav-link py-3 px-2" title="Dashboard" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                                <i class="bi-speedometer fs-4"></i>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/orders.php" class="nav-link py-3 px-2" title="Orders" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
                                <i class="bi-table fs-4"></i>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/devices.php" class="nav-link py-3 px-2" title="Devices" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers">
                                <i class="bi-grid-fill fs-4"></i>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/users.php" class="nav-link py-3 px-2" title="Users" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers">
                                <i class="bi-people-fill fs-4"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-person-circle text-primary fs-4"></i>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
                            <li><a class="dropdown-item" href="/admin/edit_profile.php?id=<?= $_SESSION['user']['id'] ?>">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="/admin">Profile</a></li>
                            <li>
                              <form action="../../logout.php" method="get">
                                <button type="submit" class="btn dropdown-item" value="Logout"><i class="bi bi-box-arrow-right"></i> Logout</button>
                              </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>