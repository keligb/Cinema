<div class="container-fluid">
     <div class="row justify-content-center">
         {{-- enctype attribute is important if your form contains file upload --}}
         {{-- Please check https://www.w3schools.com/tags/att_form_enctype.asp for further info --}}
         <form class="m-2" style="width: 40%" method="post" action="" enctype="multipart/form-data">
             @csrf
             <div class="form-group">
                 <input type="text" class="form-control" id="titre" placeholder="Entrer le titre du film" name="titre" required="required">
             </div>
             <div class="form-group">
                 <textarea class="form-control" id="resume" name="resume" placeholder="Entrer le résumé du film"  required="required"></textarea>
             </div>
             <div class="form-group">
                 <input type="text" class="form-control" id="director" placeholder="Entrer le nom du producteur"  required="required" name="director">
             </div>
             <div class="form-group">
                 <label for="genre">Genre</labeL>
                 <select class="form-control" name="genre" id="genre">
                     @foreach($genres as $genre)
                         <option value={{$genre->id_genre}}>{{$genre->nom}}</option>
                     @endforeach
                 </select>
             </div>
             <div class="form-group">
                 <label for="start-date-display">Date de début d'affiche</labeL>
                 <input type="date" class="form-control" id="start_date_display" placeholder="" name="start_date_display" min="20/" required="required" min="">
             </div>
             <div class="form-group">
                 <label for="end-date-display">Date de fin d'affiche</labeL>
                 <input type="date" class="form-control" id="end_date_display" placeholder="" name="end_date_display" required="required">
             </div>
             <div class="form-group">
                 <input type="number" class="form-control" id="duration" placeholder="Entrer la durée du film en minutes" name="duration" min="20" max="210">
             </div>
             <div class="form-group">
                 <input type="number" class="form-control" id="production_year" placeholder="Entrer l'année de production du film" name="production_year" min="1895" max="2022">
             </div>
             <div class="form-group">
                 <input type="text" class="form-control" id="name" placeholder="Entrer le nom de l'image" name="name" required="required">
             </div>
             <div class="form-group">
                 <label for="image">Choisir une image</label>
                 <input id="image" type="file" name="image">
             </div>
             <button type="submit" class="btn btn-dark d-block w-75 mx-auto">Ajouter le film</button>
         </form>
     </div>
     @include('components.errors')
 </div>