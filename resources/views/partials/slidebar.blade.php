<button class="btn btn-success form-control m2">Deposit: {{(Auth::user()->deposit) ? Auth::user()->deposit : 0}} rsd</button><br><br>
            <a href="{{ route('home') }}" class="btn btn-secondary form-control">All ads</a><br><br>
            <a href="{{ route('home.AddDeposit') }}" class="btn btn-secondary form-control">Add deposit</a><br><br>
            <a href="{{ route('home.showMessages') }}" class="btn btn-secondary form-control">Messages 
            <span>{{Auth::user()->messages->count()}}</span></a><br><br>
            <a href="{{ route('home.addAd') }}" class="btn btn-primary form-control">New ads</a>
        