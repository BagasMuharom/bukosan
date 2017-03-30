<form action="{{ url('req') }}" method="post">
    {{ csrf_field() }}
    <input type="text" name="nama"/>
    <input type="submit" value="Kirim"/>
</form>