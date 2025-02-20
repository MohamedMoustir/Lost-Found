<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Annonces</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</head>

<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto">
            <h1 class="text-2xl font-bold text-white">Mes Annonces</h1>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-8">
        <!-- Search Section -->
        <div class="mb-8">
            <div class="flex gap-4">
                <input type="text" placeholder="Rechercher une annonce..." 
                    class="flex-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                    Rechercher
                </button>
            </div>
        </div>

        <!-- Announcements Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Announcement Card 1 -->
             @if ($annonce)
             
      
             @foreach ($annonce as $ann )
             
       
            <div class="bg-white rounded-lg shadow-md overflow-hidden relative">
                <div class="absolute top-2 right-2 flex gap-2">
                    <a href="{{ Route('annonce.editeAnnonce',['id' => $ann->id_annonce])}}" class="bg-blue-100 p-2 rounded-full hover:bg-blue-200">
                        <i class="fas fa-edit text-blue-600"></i>
                    </a>
                    <a href="{{ Route('annonce.delete',['id' => $ann->id_annonce]) }}" class="bg-red-100 p-2 rounded-full hover:bg-red-200">
                        <i class="fas fa-trash text-red-600"></i>
                    </a>
                </div>
                <img src="{{ asset('storage/' . $ann->image) }}" alt="Annonce 1" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $ann->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ $ann->description }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-blue-600 font-bold">location : {{ $ann->location }}</span>
                        <a href="{{ route('annonce.detaile', ['id' => $ann->id_annonce]) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Voir détails
                        </a>
                    </div>
                </div>
            </div>
      @endforeach
      @else
    <p class="text-gray-500">Aucun commentaire disponible pour cette annonce.</p>
@endif

        


               
        
        </div>
    </main>

    <footer class="bg-gray-800 text-white p-4 mt-8">
        <div class="container mx-auto text-center">
            <p>© 2025 Mes Annonces - Tous droits réservés</p>
        </div>
    </footer>
</body>
</html>