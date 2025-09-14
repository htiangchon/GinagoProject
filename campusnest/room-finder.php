<?php /* room-finder.php */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Finder - CampusNest</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'views/nav.php'; ?>

    <main class="page-content">
        <div class="room-finder-container">
            <div class="filters-section">
                <h2>Find Your Perfect Room</h2>
                <div class="filters-grid">
                    <div class="filter-group">
                        <label for="buildingFilter">Building</label>
                        <select id="buildingFilter" onchange="roomFinder.filterRooms()">
                            <option value="">All Buildings</option>
                            <option value="North Hall">North Hall</option>
                            <option value="South Hall">South Hall</option>
                            <option value="East Hall">East Hall</option>
                            <option value="West Hall">West Hall</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="typeFilter">Room Type</label>
                        <select id="typeFilter" onchange="roomFinder.filterRooms()">
                            <option value="">All Types</option>
                            <option value="Single">Single</option>
                            <option value="Double">Double</option>
                            <option value="Suite">Suite</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="priceFilter">Price Range</label>
                        <select id="priceFilter" onchange="roomFinder.filterRooms()">
                            <option value="">All Prices</option>
                            <option value="500-700">₱2500 - ₱3000</option>
                            <option value="700-900">₱3000 - ₱3500</option>
                            <option value="900-1100">₱3900 - ₱4100</option>
                            <option value="1100+">₱5100+</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="availabilityFilter">Availability</label>
                        <select id="availabilityFilter" onchange="roomFinder.filterRooms()">
                            <option value="">All Rooms</option>
                            <option value="available">Available</option>
                            <option value="reserved">Reserved</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="results-section">
                <div class="results-header">
                    <h3 id="resultsCount">Showing 12 rooms</h3>
                    <div class="sort-controls">
                        <label for="sortBy">Sort by:</label>
                        <select id="sortBy" onchange="roomFinder.sortRooms()">
                            <option value="price-low">Price: Low to High</option>
                            <option value="price-high">Price: High to Low</option>
                            <option value="building">Building</option>
                            <option value="type">Room Type</option>
                        </select>
                    </div>
                </div>
                <div class="rooms-grid" id="roomsGrid"></div>
            </div>
        </div>

        <!-- Room Details Modal -->
        <div class="modal" id="roomModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="modalTitle">Room Details</h3>
                    <button class="close-btn" onclick="roomFinder.closeModal()">×</button>
                </div>
                <div class="modal-body" id="modalBody"></div>
            </div>
        </div>
    </main>

    <?php include 'views/footer.php'; ?>
    <script src="js/app.js"></script>
</body>
</html>
