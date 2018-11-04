from django.conf.urls import url, include
from django.contrib import admin
from django.urls import path, include
from business import views
from business.views import *
from rest_framework import routers
from django.conf import settings
from django.conf.urls.static import static

router = routers.DefaultRouter()
# router.register('posts', views.PostView)

urlpatterns = [
    path('admin/', admin.site.urls),
    path('', include(('business.urls', 'business'), namespace='business')),
    url(r"^account/", include("account.urls")),
    # url(r'^api/', include(router.urls)),
    path('api/', include(router.urls)),
    url(r'^django-tinymce-master/', include('tinymce.urls')),
    # url(r'^login/$', views.login, {'template_name': 'login.html'}), 
]  + static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)  + static(settings.STATIC_URL, document_root=settings.STATIC_ROOT)
