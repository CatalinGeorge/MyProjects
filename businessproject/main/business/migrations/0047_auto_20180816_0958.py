# Generated by Django 2.1 on 2018-08-16 09:58

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('business', '0046_service'),
    ]

    operations = [
        migrations.RenameField(
            model_name='service',
            old_name='imagetop',
            new_name='image',
        ),
    ]