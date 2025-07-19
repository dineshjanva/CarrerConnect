<style>
    .language-selector select {
        padding: 2px 12px;
        font-size: 14px;
        color: #333;
        width: auto;
        background-color: #fff;
        border: 1px solid #ccc;
        background-position: right 10px center;
        background-size: 16px;
        cursor: pointer;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .language-selector select:focus {
        outline: none;
        border-color: #4f46e5;

        box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.3);
    }

    @media (max-width: 600px) {
        .language-selector {
            display: none;
        }
    }
</style>

<footer>
    <div class="footer-container">
        <div class="footer-col">
            <h3>{{ __('messages.footer.title') }}</h3>
            <p>{{ __('messages.footer.description') }}</p>



            <div class="social-links">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <div class="footer-col">
            <h3>{{ __('messages.footer.job_seekers') }}</h3>
            <ul>
                <li><a href="#">{{ __('messages.footer.career_resources') }}</a></li>
                <li><a href="#">{{ __('messages.footer.salary_calculator') }}</a></li>
                <li><a href="#">{{ __('messages.footer.resume_builder') }}</a></li>
                <li><a href="#">{{ __('messages.footer.browse_jobs') }}</a></li>
                <li><a href="#">{{ __('messages.footer.job_alerts') }}</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h3>{{ __('messages.footer.employers') }}</h3>
            <ul>
                <li><a href="#">{{ __('messages.footer.employer_resources') }}</a></li>
                <li><a href="#">{{ __('messages.footer.recruiting_solutions') }}</a></li>
                <li><a href="#">{{ __('messages.footer.search_resumes') }}</a></li>
                <li><a href="#">{{ __('messages.footer.pricing_plans') }}</a></li>
                <li><a href="#">{{ __('messages.footer.post_job') }}</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h3>{{ __('messages.footer.company') }}</h3>
            <ul>
                <!-- <li><a href="#">{{ __('messages.footer.about_us') }}</a></li> -->
                <li><a href="#">{{ __('messages.footer.contact_us') }}</a></li>
                <li><a href="{{ route('resourse') }}">{{ __('messages.header.resources') }}</a></li>
                <li><a href="#">{{ __('messages.footer.careers') }}</a></li>
                <li><a href="{{ route('about') }}">{{ __('messages.header.about') }}</a></li>
                <li><a href="#">{{ __('messages.footer.press') }}</a></li>
                <li><a href="#">{{ __('messages.footer.blog') }}</a></li>
            </ul>
        </div>

    </div>

    <div class="copyright">
        &copy; {{ date('Y') }} CareerConnect. {{ __('messages.footer.rights_reserved') }}
    </div>
</footer>