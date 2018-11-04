from django.conf.urls import url, include
from . import views 
# from django.contrib.auth import views
# from .forms import LoginForm
# from django.contrib.auth import login, logout

urlpatterns = [
    url(r'^$', views.index, name='index'),
    url(r'^logout', views.logout, name='logout'),
    url(r'^about', views.about, name='about'),
    url(r'^add/$', views.add, name='add'),
    url(r'^signinregister', views.register, name='signinregister'),
    url(r'^contact', views.contact, name='contact'),
    # url(r'^profile', views.profile, name='profile'),
    url(r'^user-profile/$', views.user_profile, name='user_profile'),
    url(r'^terms', views.terms, name='terms'),
    url(r'^bang', views.bang, name='bang'),
    # url(r'^single/(?P<pk>\d+)', views.single, name='single'),
    #url(r'^single/(?P<pk>\d+)', views.single, name='single'),
    url(r'^(?P<slug>[-\w\d]+)-(?P<pk>\d+)$', views.single, name='single'),
    url(r'^single/edit-product/(?P<slug>[-\w\d]+)-(?P<pk>\d+)', views.edit_product, name='edit_product'),
    url(r'^(?P<slug>[-\w\d]+)-(?P<pk>\d+)/$', views.singlecat, name='singlecat'),
    url(r'^profile/(?P<slug>[-\w\d]+)-(?P<pk>\d+)', views.profile, name='profile'),
    # url(r'^companies', views.companies, name='companies'),
    url(r'^user-profile/edit/$', views.edit_profile, name='edit_profile'),
    url(r'^user-profile/change-password/$', views.change_password, name='change_password'),
    url(r'^delete/(?P<pk>\d+)', views.delete, name='delete'),
    url(r'^add_favorite/(?P<slug>[-\w\d]+)-(?P<pk>\d+)', views.add_favorite, name='add_favorite'),
    url(r'^remove_favorite/(?P<slug>[-\w\d]+)-(?P<pk>\d+)', views.remove_favorite, name='remove_favorite'),
    url(r'^remove_favorite_profile/(?P<pk>\d+)', views.remove_favorite_profile, name='remove_favorite_profile'),
    url(r'^conversation/(?P<pk>\d+)', views.conversation, name='conversation'),
    ]