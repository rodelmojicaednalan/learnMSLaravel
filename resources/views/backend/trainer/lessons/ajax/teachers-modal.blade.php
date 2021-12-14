        <table class="table table-hover table-striped mb-6">
        <thead class="thead-light">
        <tr>
                <th scope="col">Teacher</th>
                <th scope="col">Action</th>                  
        </tr>
        </thead>
        <tbody>

            @foreach($teachers as $teacher)

        

                <tr>
                <th scope="row">{{ $teacher->user->first_name }} {{ $teacher->user->last_name }}</th>
                <td><button class="btn btn-primary">Add Grade</button></td>

                </tr>


            @endforeach  
   
    
              
        </tbody>
        </table>



