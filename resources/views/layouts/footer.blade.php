<footer class="d-flex flex-column flex-md-row align-items-center justify-content-around gap-2 small py-4" style="background-color: #171719">
    <div class="d-flex align-items-center gap-3">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}" style="list-style:none;">
            <img src="{{ asset('images/organizeMe.png') }}" alt="Logo OrganizeMe"
                style="height: 40px; width: auto;">
        </a>
    </div>

    <div class="d-flex flex-md-column flex-row justify-content-center align-items-center gap-2 small text-secondary">
        <div>
            © {{ date('Y') }} Equipe OrganizeMe
        </div>
        <span class="text-secondary d-none d-md-inline">
            Trabalho acadêmico • PLP • 2025.2
        </span>
        <div class="d-flex gap-3">
            <a class="link-secondary" href="https://github.com/JadsonSS12/OrganizePlanner.git" target="_blank"
                rel="noopener">Repositório</a>
        </div>
    </div>

    <div class="d-flex align-items-center gap-2">
        <span class="text-secondary">Equipe:</span>
        <a class="link-secondary" href="https://github.com/ogustavobrandao" target="_blank"
            rel="noopener">Gustavo</a>
        <span class="text-secondary">•</span>
        <a class="link-secondary" href="https://github.com/JadsonSS12" target="_blank" rel="noopener">Jadson</a>
        <span class="text-secondary">•</span>
        <a class="link-secondary" href="https://github.com/VinniGomes7" target="_blank"
            rel="noopener">Vinicius</a>
    </div>

</footer>
