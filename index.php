<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet"
        href="https://pro.fontawesome.com/releases/v5.13.1/css/all.css"
        crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sneaker Database</title>
    <link rel="icon" type="image/png" href="images/database-solid.svg">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
		<div class="container"> <a class="navbar-brand" href="#">GYLIANTO MONADJAT</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"> <a class="nav-link" href="https://gyliboomin.nl">Home
                          <span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul>
			</div>
		</div>
	</nav>
    <div class="py-5"></div>
    <div class="container mx-auto py-5 ">
        <form action="" class="form-inline">
            <div class="form-row align-items-center">
                <div class="form-group">
                    <input type="text" class="form-control my-1 mr-sm-2 text-dark" id="name" placeholder="Sneaker Name">
                </div>
                <div class="form-group">
                    <select class="custom-select my-1 mr-sm-2" id="brand">
                        <option selected value="">Brands</option>
                        <option>Jordan</option>
                        <option>Adidas</option>
                        <option>Nike</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control my-1 mr-sm-2" id="styleId" placeholder="styleId">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control my-1 mr-sm-2" id="colorway" placeholder="colorway">
                </div>
                <div class="form-group">
                    <select class="custom-select my-1 mr-sm-2" id="gender">
                        <option selected value="">gender</option>
                        <option>men</option>
                        <option>women</option>
                        <option>infant</option>
                        <option>toddler</option>
                        <option>preschool</option>
                        <option>child</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control my-1 mr-sm-2" id="releaseYear" placeholder="release Year">
                </div>
            </div>
        </form>
        <div class="col-md-12 py-5 text-center">
            <button type="submit" id="submit" class="btn btn-danger">SEARCH</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">NAME</th>
                    <th scope="col">BRAND</th>
                    <th scope="col">STYLE ID</th>
                    <th scope="col">COLORWAY</th>
                    <th scope="col">GENDER</th>
                    <th scope="col">RETAIL PRICE</th>
                    <th scope="col">RELEASE YEAR</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function () {
            function showItems() {
                $.ajax({
                    url: 'sneakerdatabase.php',
                    data: {
                        name: $('#name').val(),
                        brand: $('#brand').children("option:selected").val(),
                        styleId: $('#styleId').val(),
                        colorway: $('#colorway').val(),
                        gender: $('#gender').children("option:selected").val(),
                        releaseYear: $('#releaseYear').val()
                    },
                    success: function (response) {
                        $('tbody').empty();
                        response = JSON.parse(response.slice(0, -4));
                        response.results.forEach(function (element) {
                            $('tbody').append(`
                                <tr>
                                    <th scope="row"><img src="${element.media.thumbUrl}" onerror="this.onerror=null;this.src='images/fallback.svg';" width="280"></th>
                                    <th scope="col">${element.title}</th>
                                    <th scope="col">${element.brand}</th>
                                    <th scope="col">${element.styleId}</th>
                                    <th scope="col">${element.colorway}</th>
                                    <th scope="col">${element.gender}</th>
                                    <th scope="col">${element.retailPrice}</th>
                                    <th scope="col">${element.releaseDate}</th>
                                </tr>`)
                        });
                    }
                });
            }

            showItems();

            $('#submit').click(function () {
                showItems();
            });
        });
    </script>
    <footer>
        <p>Created by <a href="https://github.com/gyliboomin/sneaker-api" target="_blank">Gyliboomin</a> & <a href="https://s-zegers.com/" target="_blank">Kyzegs</a></p>
    </footer>
</body>
</html>