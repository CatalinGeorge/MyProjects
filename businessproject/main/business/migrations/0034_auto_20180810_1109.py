# Generated by Django 2.1 on 2018-08-10 11:09

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('business', '0033_auto_20180810_1106'),
    ]

    operations = [
        migrations.AddField(
            model_name='languages',
            name='a62',
            field=models.CharField(default='Access your account', max_length=150),
        ),
        migrations.AddField(
            model_name='languages',
            name='a63',
            field=models.CharField(default='Use credentials you already setup during the registration process', max_length=150),
        ),
        migrations.AddField(
            model_name='languages',
            name='a64',
            field=models.CharField(default='Username', max_length=150),
        ),
        migrations.AddField(
            model_name='languages',
            name='a65',
            field=models.CharField(default='Password', max_length=150),
        ),
        migrations.AddField(
            model_name='languages',
            name='a66',
            field=models.CharField(default='Login', max_length=150),
        ),
        migrations.AddField(
            model_name='languages',
            name='a67',
            field=models.CharField(default='Facebook', max_length=150),
        ),
        migrations.AddField(
            model_name='languages',
            name='a68',
            field=models.CharField(default='Don.t have an account yet?', max_length=150),
        ),
        migrations.AddField(
            model_name='languages',
            name='a69',
            field=models.CharField(default='Create an account', max_length=150),
        ),
        migrations.AddField(
            model_name='languages',
            name='a70',
            field=models.CharField(default='Back to home', max_length=150),
        ),
    ]
