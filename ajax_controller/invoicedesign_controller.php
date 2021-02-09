
<?php


function printingdiv()
{

    echo '

            
                    <div class="row mb-5">
                        <div class="col-12 text-center mb-4">
                            <img src="../../assets/images/logo.svg" class="navbar-brand-img brand-sm mx-auto mb-4" alt="...">
                            <h2 class="mb-0 text-uppercase">Invoice</h2>
                            <p class="text-muted"> Altavista<br /> 9022 Suspendisse Rd. </p>
                        </div>
                        <div class="col-md-7">
                            <p class="small text-muted text-uppercase mb-2">Invoice from</p>
                            <p class="mb-4">
                                <strong>Imani Lara</strong><br /> Asset Management<br /> 9022 Suspendisse Rd.<br /> High Wycombe<br /> (478) 446-9234<br />
                            </p>
                            <p>
                                <span class="small text-muted text-uppercase">Invoice #</span><br />
                                <strong>1806</strong>
                            </p>
                        </div>
                        <div class="col-md-5">
                            <p class="small text-muted text-uppercase mb-2">Invoice to</p>
                            <p class="mb-4">
                                <strong>Walter Sawyer</strong><br /> Human Resources<br /> Ap #992-8933 Sagittis Street<br /> Ivanteyevka<br /> (803) 792-2559<br />
                            </p>
                            <p>
                                <small class="small text-muted text-uppercase">Due date</small><br />
                                <strong>April, 20, 2020</strong>
                            </p>
                        </div>
                    </div> <!-- /.row -->
                    <table class="table table-striped table-sm table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th class="wp">Description</th>
                                <th class="text-right sp">Rate</th>
                                <th class="text-right sp">Hours</th>
                                <th class="text-right sp">Ammout</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td> Creative Design<br />
                                    <span class="small text-muted">Design responsive website with existing prototype</span>
                                </td>
                                <td class="text-right">$15.00</td>
                                <td class="text-right">2</td>
                                <td class="text-right">$30.00</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td> Front-End Development<br />
                                    <span class="small text-muted">Markup conversion and adding JavaScript</span>
                                </td>
                                <td class="text-right">$20.00</td>
                                <td class="text-right">5</td>
                                <td class="text-right">$100.00</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td> Back-End Development<br />
                                    <span class="small text-muted">Database intergration with model functions</span>
                                </td>
                                <td class="text-right">$25.00</td>
                                <td class="text-right">7</td>
                                <td class="text-right">$155.00</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row mt-5">
                        <div class="col-2 text-center">
                            <img src="../../assets/images/qrcode.svg" class="navbar-brand-img brand-sm mx-auto my-4" alt="...">
                        </div>
                        <div class="col-md-5">
                            <p class="text-muted small">
                                <strong>Note :</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam hendrerit nisi sed sollicitudin pellentesque. Nunc posuere purus rhoncus pulvinar aliquam. </p>
                        </div>
                        <div class="col-md-5">
                            <div class="text-right mr-2">
                                <p class="mb-2 h6">
                                    <span class="text-muted">Subtotal : </span>
                                    <strong>$285.00</strong>
                                </p>
                                <p class="mb-2 h6">
                                    <span class="text-muted">VAT (10%) : </span>
                                    <strong>$28.50</strong>
                                </p>
                                <p class="mb-2 h6">
                                    <span class="text-muted">Total : </span>
                                    <span>$313.50</span>
                                </p>
                            </div>
                        </div>
                    </div> <!-- /.row -->
               
       
';
}
