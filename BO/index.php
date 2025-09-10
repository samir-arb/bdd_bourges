<?php
include($_SERVER['DOCUMENT_ROOT'] . '/host.php');

include($_SERVER['DOCUMENT_ROOT'] . '/BO/_blocks/sidebar.php');

include($_SERVER['DOCUMENT_ROOT'] . '/BO/_blocks/header.php');

include($_SERVER['DOCUMENT_ROOT'] . '/BO/_blocks/ariane.php');

include($_SERVER['DOCUMENT_ROOT'] . '/BO/_blocks/analytics.php');

?>

<div class="records table_responsive">
    <div class="record_header spaceBetween alignCenter">
        <div class="add alignCenter">
            <span>Entries</span>
            <select name="#" id="#">
                <option value="#">ID</option>
            </select>
            <button>Add record</button>
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
include($_SERVER['DOCUMENT_ROOT'] . '/BO/_blocks/footer.php');

?>