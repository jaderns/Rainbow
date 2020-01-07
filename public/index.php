
<html>
    <body>
        <div class="container">
        <?php 
include('header.php');
?>
            <div class="item item4">
              <div class="flex">
                <div class="content1">FLEX</div>
                <div class="content2">BOX</div>
                </div>
            </div>
            <div class="item item5">
            <h2 class="item">Nouveautés</h2>
                <!-- <div class="img1"><a href=""><img src="" alt=""></a></div> <div
                class="img2"><a href=""><img src="" alt=""></a></div> <div class="img3"><a
                href=""><img src="" alt=""></a></div>-->
            </div>
            
            <div class="item item6"></div> <!-- background vert -->
            <div class="item start_col2 end_col12">
            <h2 class="item">FAQ</h2>
                <button class="collapsible">Ceci est une question concernant le produit rainbow pen?</button>
                <div class="content_collapsible">Lorem ipsum dolor sit amet consectetur
                    adipisicing elit. Quidem et, nisi voluptatibus eius exercitationem debitis
                    deleniti beatae dolore modi ratione consequuntur aspernatur pariatur! Commodi
                    excepturi accusamus laudantium debitis? Expedita, a.</div>
                <button class="collapsible">Voici la question numéro 2 concernant le stylo?</button>
                <div class="content_collapsible">Lorem ipsum dolor sit amet consectetur
                    adipisicing elit. Voluptas ab aliquam modi odit expedita consequuntur dicta
                    inventore nihil fuga reiciendis natus quam nostrum, quisquam aut impedit quis
                    cum vero similique.</div>
                <button class="collapsible">Ceci est une autre question concernant le produit rainbow pen?</button>
                <div class="content_collapsible">Lorem ipsum dolor sit amet consectetur
                    adipisicing elit. Eaque obcaecati, iste molestiae corrupti eos magni dolor
                    necessitatibus ipsum inventore explicabo soluta quas quasi labore cumque
                    repellat! Cum eius non quis?</div>
                <button class="collapsible">Voici encore une question concernant le stylo?</button>
                <div class="content_collapsible">Lorem ipsum dolor sit, amet consectetur
                    adipisicing elit. Autem sapiente dolores beatae nesciunt fugit quae in earum
                    tenetur ipsum? Voluptatum repudiandae, et sapiente quod ipsam beatae natus culpa
                    atque quisquam.</div>

                <script type="text/javascript" src="../js/functions.js"></script>
            </div>
            <div class="item item8">

            <?php 

include('footer.php');
?>
            </div>

            <style>
                .collapsible {
                    cursor: pointer;
                    padding: 1%;
                    margin: 1% 0;
                    width: 100%;
                    border: 1px solid black;
                    outline: none;
                }

                .active,
                .collapsible:hover {
                    background-color: lightgrey;
                    color: black;
                }

                .content_collapsible {
                    padding: 1%;
                    background-color: lightgrey;
                    display: none;
                }
            </style>

        </div>
    </body>
</html>