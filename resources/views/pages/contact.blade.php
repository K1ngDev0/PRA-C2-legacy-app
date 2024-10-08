<x-layouts.app>
    <div class="container">
        <h1>Contact</h1>
        <form action="/contact" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Naam:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="message">Bericht:</label>
                <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Verstuur</button>
        </form>
    </div>
</x-layouts.app>