</div>
</section>
</div>
</main>


<footer class="home-section text-center text-lg-start container-fluid" style="min-height: 1vh; background-color: inherit;">
    <!-- Grid container -->
    <div class="container p-4">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-lg">
                <h5 class="text-uppercase">Mission</h5>
                <p>
                    To establish and improve accuracy and accountability of all tangible assets by physical inventories, propert issurance and monitoring.
                </p>
            </div>
            <!--Grid column-->
            <!--Grid column-->
            <div class="col-lg">
                <h5 class="text-uppercase">Vision</h5>
                <p>
                    To meet a variety of daily custodial needs of the campus in a timely manner and to provide an array of functions that are vital to the daily school operation.
                </p>
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>
    <!-- Grid container -->
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright:
        <p class="text-dark">Bestlink College of the Philippines</p>
    </div>
    <!-- Copyright -->
</footer>
<script src="../script/bootstrap.bundle.js"></script>
<script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");
    let searchBtn = document.querySelector(".bx-search");
    let arrow = document.querySelectorAll(".arrow");

    closeBtn.addEventListener("click", () => {
        sidebar.classList.toggle("open");
        menuBtnChange(); //calling the function(optional)
    });

    searchBtn.addEventListener("click", () => {
        // Sidebar open when you click on the search iocn
        sidebar.classList.toggle("open");
        menuBtnChange(); //calling the function(optional)
    });

    // following are the code to change sidebar button(optional)
    function menuBtnChange() {
        if (sidebar.classList.contains("open")) {
            closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
        } else {
            closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
        }
    }

    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.currentTarget.parentNode;
            console.log(arrowParent);
            arrowParent.classList.toggle("showMenu");
        });
    }

    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    });
</script>