# Generated by Django 2.1 on 2018-08-13 07:53

import django.core.validators
from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('business', '0041_socials'),
    ]

    operations = [
        migrations.AlterField(
            model_name='socials',
            name='google',
            field=models.TextField(default='', validators=[django.core.validators.URLValidator()]),
        ),
        migrations.AlterField(
            model_name='socials',
            name='pinterest',
            field=models.TextField(default='', validators=[django.core.validators.URLValidator()]),
        ),
        migrations.AlterField(
            model_name='socials',
            name='twitter',
            field=models.TextField(default='', validators=[django.core.validators.URLValidator()]),
        ),
        migrations.AlterField(
            model_name='socials',
            name='youtube',
            field=models.TextField(default='', validators=[django.core.validators.URLValidator()]),
        ),
    ]
