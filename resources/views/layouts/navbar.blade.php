
  <nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
    <div class="d-flex align-items-center">
      <div class="toggle-icon-wrapper">

        <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

      </div><a class="navbar-brand" href="/">
        <div class="d-flex align-items-center py-3"><img class="me-2" src="../assets/img/icons/spot-illustrations/falcon.png" alt="" width="40" /><span class="font-sans-serif">falcon</span>
        </div>
      </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
      <div class="navbar-vertical-content scrollbar">
        <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
          <li class="nav-item">
            <!-- parent pages--><a class="nav-link" href="/" role="button" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Dashboard</span>
              </div>
            </a>
          </li>
          <li class="nav-item">
            <!-- label-->
            <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
              <div class="col-auto navbar-vertical-label">App
              </div>
              <div class="col ps-0">
                <hr class="mb-0 navbar-vertical-divider" />
              </div>
            </div>
             <!-- parent pages-->
             <a class="nav-link" href="{{ route('vistaCaja') }}" role="button" data-bs-toggle="" aria-expanded="false">
                <div class="d-flex align-items-center">
                      <span class="nav-link-icon">
                          <span class="fas fa-shopping-cart"></span>
                      </span>
                      <span class="nav-link-text ps-1">Caja</span>
                </div>
              </a>
             <a class="nav-link" href="{{ route('productos-list') }}" role="button" data-bs-toggle="" aria-expanded="false">
                <div class="d-flex align-items-center">
                      <span class="nav-link-icon">
                          <span class="fas fa-bone"></span>
                      </span>
                      <span class="nav-link-text ps-1">Productos</span>
                </div>
              </a>
             <a class="nav-link" href="{{ route('client-list') }}" role="button" data-bs-toggle="" aria-expanded="false">
                <div class="d-flex align-items-center">
                      <span class="nav-link-icon">
                          <span class="fas fa-users"></span>
                      </span>
                      <span class="nav-link-text ps-1">Clientes</span>
                </div>
              </a>
          </li>
          <li class="nav-item">
            <!-- label-->
            <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
              <div class="col-auto navbar-vertical-label">Pages
              </div>
              <div class="col ps-0">
                <hr class="mb-0 navbar-vertical-divider" />
              </div>
            </div>
          </li>
          <li class="nav-item">
            <!-- label-->
            <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
              <div class="col-auto navbar-vertical-label">Modules
              </div>
              <div class="col ps-0">
                <hr class="mb-0 navbar-vertical-divider" />
              </div>
            </div>
            <!-- parent pages--><a class="nav-link dropdown-indicator" href="#forms" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-file-alt"></span></span><span class="nav-link-text ps-1">Forms</span>
              </div>
            </a>
            <ul class="nav collapse" id="forms">
              <li class="nav-item"><a class="nav-link dropdown-indicator" href="#basic" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Basic</span>
                  </div>
                </a>
                <!-- more inner pages-->
                <ul class="nav collapse" id="basic">
                  <li class="nav-item"><a class="nav-link" href="../modules/forms/basic/form-control.html" data-bs-toggle="" aria-expanded="false">
                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Form control</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                  </li>
                  <li class="nav-item"><a class="nav-link" href="../modules/forms/basic/input-group.html" data-bs-toggle="" aria-expanded="false">
                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Input group</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                  </li>
                  <li class="nav-item"><a class="nav-link" href="../modules/forms/basic/select.html" data-bs-toggle="" aria-expanded="false">
                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Select</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                  </li>
                  <li class="nav-item"><a class="nav-link" href="../modules/forms/basic/checks.html" data-bs-toggle="" aria-expanded="false">
                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Checks</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                  </li>
                  <li class="nav-item"><a class="nav-link" href="../modules/forms/basic/range.html" data-bs-toggle="" aria-expanded="false">
                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Range</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                  </li>
                  <li class="nav-item"><a class="nav-link" href="../modules/forms/basic/layout.html" data-bs-toggle="" aria-expanded="false">
                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Layout</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                  </li>
                </ul>
              </li>
              <li class="nav-item"><a class="nav-link dropdown-indicator" href="#advance" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Advance</span>
                  </div>
                </a>
                <!-- more inner pages-->
                <ul class="nav collapse" id="advance">
                  <li class="nav-item"><a class="nav-link" href="../modules/forms/advance/advance-select.html" data-bs-toggle="" aria-expanded="false">
                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Advance select</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                  </li>
                  <li class="nav-item"><a class="nav-link" href="../modules/forms/advance/date-picker.html" data-bs-toggle="" aria-expanded="false">
                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Date picker</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                  </li>
                  <li class="nav-item"><a class="nav-link" href="../modules/forms/advance/editor.html" data-bs-toggle="" aria-expanded="false">
                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Editor</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                  </li>
                  <li class="nav-item"><a class="nav-link" href="../modules/forms/advance/emoji-button.html" data-bs-toggle="" aria-expanded="false">
                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Emoji button</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                  </li>
                  <li class="nav-item"><a class="nav-link" href="../modules/forms/advance/file-uploader.html" data-bs-toggle="" aria-expanded="false">
                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">File uploader</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                  </li>
                  <li class="nav-item"><a class="nav-link" href="../modules/forms/advance/rating.html" data-bs-toggle="" aria-expanded="false">
                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Rating</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                  </li>
                </ul>
              </li>
              <li class="nav-item"><a class="nav-link" href="../modules/forms/floating-labels.html" data-bs-toggle="" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Floating labels</span>
                  </div>
                </a>
                <!-- more inner pages-->
              </li>
              <li class="nav-item"><a class="nav-link" href="../modules/forms/wizard.html" data-bs-toggle="" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Wizard</span>
                  </div>
                </a>
                <!-- more inner pages-->
              </li>
              <li class="nav-item"><a class="nav-link" href="../modules/forms/validation.html" data-bs-toggle="" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Validation</span>
                  </div>
                </a>
                <!-- more inner pages-->
              </li>
            </ul>
           
          
          </li>
         
        </ul>
        <div class="settings mb-3">
          <div class="card alert p-0 shadow-none" role="alert">
            <div class="btn-close-falcon-container">
              <div class="btn-close-falcon" aria-label="Close" data-bs-dismiss="alert"></div>
            </div>
            <div class="card-body text-center"><img src="../assets/img/icons/spot-illustrations/navbar-vertical.png" alt="" width="80" />
              <p class="fs--2 mt-2">Loving what you see? <br />Get your copy of <a href="#!">Falcon</a></p>
              <div class="d-grid"><a class="btn btn-sm btn-purchase" href="https://themes.getbootstrap.com/product/falcon-admin-dashboard-webapp-template/" target="_blank">Purchase</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>