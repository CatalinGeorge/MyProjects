from django.conf import settings
from django.shortcuts import render, redirect
from django.contrib.auth import login, authenticate
from django.contrib.auth.forms import UserCreationForm, AuthenticationForm
from django.http import HttpResponseRedirect
from django.contrib.auth.decorators import login_required
from .models import *
from django.contrib.auth.forms import UserChangeForm, PasswordChangeForm
# from .forms import PostForm, RegisterForm, AddBusinessForm
from django.utils import timezone
from django import forms
from .forms import *
from django.contrib import auth
from django.shortcuts import get_object_or_404, redirect, render
from django.contrib.auth import login, logout
from django.http import HttpResponse, HttpResponseRedirect
from business.forms import RegistrationForm, LoginForm, EditProfileForm, EditProductForm, ReplyForm, ChatForm, CommentForm, CommentReplyForm
from django.contrib.auth import update_session_auth_hash
from django.contrib.auth.models import User
from .forms import AddBusinessForm, SavedForm, RatingForm
from django.shortcuts import render_to_response
from array import array
from .models import Saved
from django.urls import reverse
from django.db.models import F
from django.contrib import messages
import numpy as np
from django.contrib.auth import logout as django_logout
from itertools import chain
from django.utils.timezone import now
from datetime import datetime
from django.db.models import Avg, Sum, F
from django.template.defaultfilters import slugify
from tinymce.models import HTMLField


#search imports
import operator
from django.db.models import Q

def index(request):
    home_banner = Home_banner.objects.get(pk = 1)
    socials = Social.objects.all()
    categories = Categories.objects.all()
    businesses = Business.objects.all()[:4]
    services = Service.objects.all()
    args = {'categories': categories, 'businesses': businesses, 'services': services, 'socials': socials, 'home_banner': home_banner}

    if request.method == "POST":
        query = request.POST['q']
        results = Business.objects.filter(Q(title__icontains=query) | Q(description__icontains=query))
        categories = Categories.objects.all()
        businesses = Business.objects.all()[:4]
        services = Service.objects.all()
        args = {'categories': categories, 'businesses': businesses, 'services': services, 'results': results, 'socials': socials, 'home_banner': home_banner}
        return render(request, 'business/search_results.html', args)
    else:

        return render(request, 'business/home.html', args)


def about(request):
    info = About.objects.all()
    socials = Social.objects.all()
    testimonials = Testimonial.objects.all()
    return render(request, 'business/about.html', {'info': info, 'socials': socials, 'testimonials': testimonials})

def logout(request):
    if not request.user.is_authenticated:
        messages.add_message(request, messages.INFO, 'You have to login first.')
        return redirect('/')
    django_logout(request)
    messages.add_message(request, messages.INFO, 'You are logged out.')
    return  HttpResponseRedirect('/')

# def loginuser(request):
#      if request.method == 'POST':
#         username = request.POST.get('username')
#         password = request.POST.get('password')
#         user = authenticate(username=username, password=password)
#         request.session['user'] = True
#         if user is not None and user.is_active:
#             login(request, user)
#             return HttpResponseRedirect("/")
#         return HttpResponseRedirect("/")
#         form = LoginForm()
    #  return render(request, 'business/login.html', {'login_form': LoginForm})

def contact(request):
    if request.method == 'POST':
        form = FeedbackForm(request.POST)
        if form.is_valid():
            form.save(commit=True)
            return redirect('/contact/')

    else:
        if not request.user.is_authenticated:
            form = FeedbackForm(initial={})
        else:
            form = FeedbackForm(initial={'name': request.user, 'email': request.user.email})
    contact_details = ContactDetails.objects.all()
    socials = Social.objects.all()
    args = {'user': request.user, 'socials': socials, 'form':form, 'contact_details': contact_details}
    return render(request, 'business/contact.html', args)

def profile(request, slug, pk):

    user = User.objects.get(id = pk)
    total_votes = Business.objects.all().filter(user = user).aggregate(Sum('total_votes'))
    votes_number = Business.objects.all().filter(user = user).aggregate(Sum('votes_number'))
    rating = Business.objects.all().filter(user = user).aggregate(total=Avg(F('total_votes')) / Avg(F('votes_number')))['total']
    socials = Social.objects.all()
    posts = Business.objects.all().filter(user = pk)

    args = {'user': user, 'posts' : posts, 'rating': rating , 'socials': socials, 'total_votes': total_votes, 'votes_number':votes_number}
    
    return render(request, 'business/profile.html', args)

def conversation(request, pk):
    main = Chat.objects.get(id = pk)
    replies = ChatReply.objects.all().filter(chat = pk)
    mainpic = CompanyBusiness.objects.get(user = main.sender)
    mypic = CompanyBusiness.objects.get(user = request.user)

    if request.method == 'POST':
            form_reply = ReplyForm(request.POST)
            if form_reply.is_valid():

                    form_reply.chat = request.POST.get('chat', None)
                    form_reply.save(commit=True)
                    return redirect('/conversation/'+pk)
                    
            else:
                messages.error(request, "Error")
                return render(request, 'business/page.html', {'form':form_reply})



    socials = Social.objects.all()
    form_reply = ReplyForm(initial={'sender': request.user , 'receiver': request.user, 'date': datetime.now})
    args = {'main': main, 'replies': replies, 'mypic': mypic , 'mainpic': mainpic, 'form_reply': form_reply, 'socials': socials}
    return render(request, 'business/conversation.html', args)

def user_profile(request):
    if not request.user.is_authenticated:
        messages.add_message(request, messages.INFO, 'Login to access your profile.')
        return redirect('/')
    else:
    #  form_reply = ReplyForm(request.POST)
    #  if request.method == 'POST':
    #         form_reply = ReplyForm(request.POST)
    #         if form_reply.is_valid():
    #                form_reply.chat = request.POST.get('chat', None)
    #             #    form_reply.sender = request.POST.get('userino', None)
    #             #    form_reply.receiver = request.POST.get('userino', None)
    #                form_reply.save(commit=True)
    #                return redirect('/')
    #         else:
    #             messages.error(request, "Error")
    #             return render(request, 'business/page.html', {'form':form_reply})

                #return HttpResponse('Something went wrong,form is not valid.')
          

     chat = Chat.objects.filter(Q(sender= request.user) | Q(receiver= request.user)).order_by('-pk')
     

     countchat = Chat.objects.filter(Q(sender= request.user) | Q(receiver= request.user)).count
     saved = Saved.objects.all().filter(user = request.user)
     countsaved = Saved.objects.all().filter(user = request.user).count
     chatchoice = request.POST.get('chat', None)
     form_reply = ReplyForm(initial={'sender': request.user, 'receiver': request.user})
     



     socials = Social.objects.all()
     args = {'user': request.user , 'socials': socials,'form_reply': form_reply , 'countchat': countchat ,'chat': chat ,'posts' : Business.objects.all().filter(user = request.user), 'count' : Business.objects.all().filter(user = request.user).count, 'saved': saved, 'countsaved': countsaved}
     
     form_reply = ReplyForm(request.POST)
     if request.method == 'POST':
            form_reply = ReplyForm(request.POST)
            if form_reply.is_valid():

                    form_reply.chat = request.POST.get('chat', None)
                    form_reply.save(commit=True)
                    return redirect('/')
            else:
                messages.error(request, "Error")
                return render(request, 'business/page.html', {'form':form_reply})


     return render(request, 'business/user_profile.html', args)

def edit_profile(request):
    socials = Social.objects.all()
    company_business = CompanyBusiness.objects.get(user=request.user)
    if request.method == 'POST':
        company_business = CompanyBusiness.objects.get(user=request.user)
        form = EditProfileForm(request.POST, request.FILES)
        form.instance = company_business
        if form.is_valid():
            # slug = slugify(self.title)
            # if self.slug != slug:
            #     self.slug = slug
            form.save()
            messages.add_message(request, messages.INFO, 'Account details updated.')
            return redirect('/user-profile/')
        else:
            messages.add_message(request, messages.INFO, 'Something went wrong.')
            return redirect('/user-profile/')

    else:
        form = EditProfileForm(instance=company_business)
        args = {'form': form, 'socials': socials}
        return render(request, 'business/edit_profile.html', args)

def delete(request,pk =None):
    object = Business.objects.get(id=pk)
    object.delete()
    return redirect('/user-profile/')

def edit_product(request, slug, pk):
    business = Business.objects.get(id= pk)
    socials = Social.objects.all()
    if request.method == 'POST':
        business = Business.objects.get(id= pk)
        form = EditProductForm(request.POST, request.FILES)
        form.instance = business
        # form.slug = slugify(form.title)
        #form.slug = slugify(form.title)

        if form.is_valid():
            
            form.save()
            messages.add_message(request, messages.INFO, 'Business updated.')
            return redirect('/user-profile/')

    else:
        form = EditProductForm(instance=business)
        args = {'form': form, 'socials': socials}
        return render(request, 'business/edit_product.html', args)
        

def change_password(request):
    if request.method == 'POST':
        form = PasswordChangeForm(data=request.POST, user=request.user)

        if form.is_valid():
            form.save()
            update_session_auth_hash(request, form.user)
            messages.add_message(request, messages.INFO, 'Password successfully changed.')
            return redirect('/user-profile/')
        else:
            messages.add_message(request, messages.INFO, 'Passwords are not matching.')
            return redirect('/user_profile/change-password')

    else:
        form = PasswordChangeForm(user=request.user)
        args = {'form': form}
        return render(request, 'business/change_password.html', args)

def add_favorite(request, slug, pk):
    prd = Business.objects.get(pk=pk)
    if Saved.objects.filter(user=request.user, product=prd).exists():
        pass
    else:
        favorite = Saved.objects.create(user=request.user, product=prd)
    
    prdd = Business.objects.filter(pk=pk).values('id')
    return redirect('/'+slug+'-'+pk)


def remove_favorite(request, slug, pk):
    prd = Business.objects.get(pk=pk)
    Saved.objects.filter(user=request.user, product=prd).delete()
    return redirect('/'+slug+'-'+pk)

def remove_favorite_profile(request, pk):
    prd = Business.objects.get(pk=pk)
    Saved.objects.filter(user=request.user, product=prd).delete()
    return redirect('/user-profile/')

def single(request, slug, pk):
    singlebus = Business.objects.get(pk=pk)
    socials = Social.objects.all()
    images = Business.objects.filter(pk=pk).only('image1', 'image2', 'image3', 'image4', 'image5')
    Business.objects.filter(pk=pk).update(views=F('views')+1)
    user = CompanyBusiness.objects.get(user = singlebus.user)
    comments = Comment.objects.filter(business_id = pk)
    count_comments = Comment.objects.all().filter(business_id = pk).count
    comment_replys = CommentReply.objects.filter(comment_id__in=(comments))
    if singlebus.votes_number != 0 :
        average_rating = singlebus.total_votes / singlebus.votes_number
    else:
        average_rating = 1 

    if request.method == 'POST':
     if 'form_rating' in request.POST:
        business = Business.objects.get(id= pk)
        form_rating = RatingForm(request.POST)
        if form_rating.is_valid():
            
            if not request.session:
                request.session={}
            
            
            rated_list = request.session.get('rated',[])
            if pk in rated_list:
                messages.add_message(request, messages.INFO, 'You cannot rate mode than once.')
                return redirect('/'+slug+'-'+pk)
            else:
                rating_value = request.POST.get('rating_value', None)
                business.votes_number = F('votes_number') +1
                business.total_votes = F('total_votes') +rating_value
                business.save()
                rated_list.append(pk)
                request.session['rated'] = rated_list

            return redirect('/'+slug+'-'+pk)

     elif 'form_chat' in request.POST:
            if not request.user.is_authenticated:
                messages.add_message(request, messages.INFO, 'You have to login in order to send a message.')
                return redirect('/single/'+pk)
            else:
                business = Business.objects.get(id= pk)
                form_chat = ChatForm(request.POST)
                if form_chat.is_valid():
                    form_chat.save(commit=True)
                    return redirect('/'+slug+'-'+pk)

     elif 'form_comment' in request.POST:
            if not request.user.is_authenticated:
                messages.add_message(request, messages.INFO, 'You have to login in order to place a comment.')
                return redirect('/single/'+pk)
            else:
                business = Business.objects.get(id= pk)
                form_comment = CommentForm(request.POST)
                if form_comment.is_valid():
                    form_comment.save(commit=True)
                    return redirect('/'+slug+'-'+pk)

     elif 'form_reply' in request.POST:
            if not request.user.is_authenticated:
                messages.add_message(request, messages.INFO, 'You have to login in order to place a comment.')
                return redirect('/single/'+pk)
            else:
                business = Business.objects.get(id= pk)
                form_reply = CommentReplyForm(request.POST)
                if form_reply.is_valid():
                    form_reply.fields['comment_id'] = comments(pk__in=(form_reply.cleaned_data['comment_id']))
                             
                    form_reply.save(commit=True)
                    return redirect('/'+slug+'-'+pk)


    else:
        business = Business.objects.get(id= pk)
        form_rating = RatingForm()
        sender_profile = CompanyBusiness.objects.get(user = request.user)
        form_reply = CommentReplyForm(initial={'sender': request.user, 'sender_profile': sender_profile})
        form_comment = CommentForm(initial={'sender': request.user, 'business_id': business, 'sender_profile': sender_profile})
        form_chat = ChatForm(initial={'sender': request.user, 'sender_profile': sender_profile , 'receiver': business.user, 'business': business})

    
    if not request.user.is_authenticated:
        button = 'A'
    else:
        if Saved.objects.filter(user=request.user, product=singlebus).exists():
            button = 'Remove'
        else:
            button = 'Add'

    if not request.session:
        request.session={}

    saved_list = request.session.get('saved',[])
    if len(saved_list) > 3:
        saved_list.pop(0)
    if pk in saved_list:
            pass
    else:
            saved_list.append(pk)
            request.session['saved'] = saved_list

    m = saved_list
    items = Business.objects.filter(id__in=m)
    n = len(saved_list)
    socials = Social.objects.all()
    args = {'business': singlebus, 'comments': comments, 'form_reply': form_reply, 'comment_replys': comment_replys, 'count_comments': count_comments, 'form_chat': form_chat , 'form_comment': form_comment, 'socials': socials, 'user': user , 'images': images, 'button': button, 'average_rating': average_rating, 'm': m, 'n': n, 'items': items}
    return render(request, 'business/single.html', args)

def singlecat(request, slug, pk):
    businesses = Business.objects.filter(category=pk)
    text = SingleCategory.objects.get(id = 1)
    socials = Social.objects.all()
    args = {'businesses': businesses, 'text': text, 'socials': socials}

    if request.method == "POST":
        query = request.POST['q']
        results = Business.objects.filter(Q(title__icontains=query) | Q(description__icontains=query), category=pk)
        text = SingleCategory.objects.get(id = 1)
        args = {'results': results, 'text': text}
        return render(request, 'business/cat_search_results.html', args)
    else:
        return render(request, 'business/singlecat.html', args)



def terms(request):
    terms_content = Terms.objects.get(pk = 1)
    socials = Social.objects.all()
    args = {'terms_content': terms_content, 'socials': socials}
    return render(request, 'business/terms.html', args)


def bang(request):
    posts = Post.objects.all()
    form = PostForm()
    if request.method == "POST":
        form = PostForm(request.POST)
        if form.is_valid():
            post = form.save(commit=False)
            post.date = timezone.now()
            post.save()
            form=PostForm()
            return redirect('bang')
    else:
        form = PostForm()

    return render(request, 'business/bang.html', {'posts': posts, 'form': form})


def add(request):
    if not request.user.is_authenticated:
        messages.add_message(request, messages.INFO, 'Login in order to add your business.')
        return redirect('/')
    else:
     form = AddBusinessForm()
     if request.method == "POST":
         form = AddBusinessForm(request.POST, request.FILES)
         if form.is_valid():
             post = form.save(commit=False)
             post.date = timezone.now()
             post.user = request.user
             post.save()
             form=AddBusinessForm()
             return redirect('/add/')
             messages.add_message(request, messages.INFO, 'Your business has been succesfully added.')
     else:
         form = AddBusinessForm()
     socials = Social.objects.all()
     return render(request, 'business/add.html', {'form': form, 'socials':socials})

def register(request):
    if request.method =='POST':
        if 'form_register' in request.POST:
         form = RegistrationForm(request.POST)
         if form.is_valid():
            form.save()  
            new_user = authenticate(username=form.cleaned_data['username'],
                                    password=form.cleaned_data['password1'],
                                    )
            login(request, new_user)
            messages.add_message(request, messages.INFO, 'Your account has been succesfully created.')
            return redirect('/user-profile/')
        elif 'form_login' in request.POST:
            username = request.POST.get('username')
            password = request.POST.get('password')
            user = authenticate(username=username, password=password)
            request.session['user'] = True
            if user is not None and user.is_active:
                login(request, user)
                return HttpResponseRedirect("/user-profile/")
            else:
                messages.add_message(request, messages.INFO, 'Wrong credentials,please try again.')
        return HttpResponseRedirect("/signinregister/")
    else:
        form_register = RegistrationForm()
        form_login = LoginForm()
        socials = Social.objects.all()
        args = {'form_register': form_register, 'form_login': form_login, 'socials': socials}
        return render(request, 'business/signinregister.html', args)

