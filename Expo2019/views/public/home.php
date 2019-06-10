<?php
include "../../core/helpers/public/public_helper.php";
public_helper::head("Principal");
public_helper::navbar();
?>


<main>

    <div class="row" style="height: 450px;">
        <div class="col-xl-8 col-12">
            <img style="object-fit: cover" height="450px" width="100%" src="http://www.clinicavespucio.cl/wp-content/uploads/2017/05/Urgencia-Cl%C3%ADnica-Vespucio.jpg" alt="Responsive image" />
        </div>
        <div class="col-xl-4 col-12" style="height: 100%; display: flex; align-items: center;">
            <div style="">
                <h2 class="text-center">SISMED</h2>
                <h5>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium,
                    reiciendis enim eius, architecto nemo sequi amet unde quaerat
                    distinctio dolorem ex illum incidunt quidem mollitia. Libero quam
                    earum atque suscipit.
                </h5>
            </div>
        </div>
    </div>

    <div class="row mt-4 justify-content-center">
        <div class="card" style="width: 17rem;">
            <img style="object-fit: cover" height="230px" width="100%" src="https://media.wired.com/photos/5a25b07469e4a92363d488e4/master/pass/16-CyberPowerPC-Gaming-Desktop-SOURCE-Amazon.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-center">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        <div class="card" style="width: 17rem;">
            <img style="object-fit: cover" height="230px" width="100%" src="https://www.overclockers.co.uk/media/image/thumbnail/FS453OE_198382_750x750.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-center">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        <div class="card" style="width: 17rem;">
            <img style="object-fit: cover" height="230px" width="100%" src="https://www.wepc.com/wp-content/uploads/2018/05/gaming-pc.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-center">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>

</main>

<?php
public_helper::footer();
public_helper::script('home.js');
?>