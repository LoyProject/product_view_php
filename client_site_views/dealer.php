<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title> Loy Team Project </title>
</head>

<?php include 'header.php'?>

<body>
    <div class="container mx-auto p-16 mt-8">
        <div class="font-sans">
            <div class="lg:max-w-5xl max-w-3xl mx-auto">
                <div class="max-w-2xl mx-auto text-center">
                    <h2 class="text-gray-800 text-3xl font-extrabold">Visit To Our Dealer</h2>
                    <p class="text-gray-800 text-sm mt-4 leading-relaxed">Our dealer is location that you can visit to
                        see our products and services. You can also get a consultation from our team.
                    </p>
                </div>
                <div class="grid lg:grid-cols-4 md:grid-cols-3 gap-6 max-md:justify-center mt-8">
                    <div class="border rounded-lg overflow-hidden">
                        <img src="https://readymadeui.com/team-1.webp" class="w-full h-56 object-cover" />
                        <div class="p-4">
                            <h4 class="text-gray-800 text-base font-bold">John Doe</h4>
                            <div class="space-x-2 flex items-center">
                                <p class="text-gray-500 text-xs mt-1 leading-relaxed hover:text-red-500">+85511425717</p>
                            </div>
                            <article class="text-wrap">
                                <p class="text-gray-500 text-xs mt-1 leading-relaxed break-words hover:text-red-500"> 22D1E0, St01, Dangkor, Dangkor, Phnom Penh, Cambodia</p>
                                </p>
                            </article>
                            <div class="mt-4">
                                <a href="https://maps.app.goo.gl/6iHi9N8s6vtxb3yy7" target="_blank">
                                    <button
                                        class="w-full bg-red-500 hover:bg-red-700 text-white font-xs py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                        View Location
                                    </button>
                                </a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'?>
</body>

</html>