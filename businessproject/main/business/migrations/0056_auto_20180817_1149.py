# Generated by Django 2.1 on 2018-08-17 11:49

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('business', '0055_testimonials'),
    ]

    operations = [
        migrations.RenameModel(
            old_name='Testimonials',
            new_name='Testimonial',
        ),
    ]
